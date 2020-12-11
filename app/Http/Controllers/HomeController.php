<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use DB;
class HomeController extends Controller
{
    public function index() {

        $category = Category::all();
        $subcategory = SubCategory::all();

        $productLatest = DB::table('users')
        ->join('user_profiles', 'users.id_profile', '=', 'user_profiles.id_profile')
        ->join('stores', 'stores.store_id', '=', 'user_profiles.store_id')
        ->join('products', 'stores.store_id', '=', 'products.store_id')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->join('sub_categories', 'products.id_subcategory', '=', 'sub_categories.id_subcategory')
        ->orderby('products.store_id', 'DESC')
        ->select('*')
        ->paginate(6);


       

        $data = [
            'category'=> $category,
            'subcategory'=> $subcategory,
            'product'=> $productLatest
        ];

        return view('beranda.index', $data);
    }

    public function bycategory($idcategory, $idsubcategory) {
        $category = Category::all();
        $subcategory = SubCategory::all();

        $product = DB::table('users')
        ->join('user_profiles', 'users.id_profile', '=', 'user_profiles.id_profile')
        ->join('stores', 'stores.store_id', '=', 'user_profiles.store_id')
        ->join('products', 'stores.store_id', '=', 'products.store_id')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->join('sub_categories', 'products.id_subcategory', '=', 'sub_categories.id_subcategory')
        ->where([
            ['products.id_category', '=', $idcategory],
            ['products.id_subcategory', '=', $idsubcategory],
        ])
        ->paginate(6);


        $data = [
            'category'=> $category,
            'subcategory'=> $subcategory,
            'product' =>$product
        ];



        return view('beranda.index', $data);



    }

    public function detail($idcategory, $idsubcategory, $idproduct, $idstore) {
        $category = Category::all();
        $subcategory = SubCategory::all();

        $product = DB::table('users')
        ->join('user_profiles', 'users.id_profile', '=', 'user_profiles.id_profile')
        ->join('stores', 'stores.store_id', '=', 'user_profiles.store_id')
        ->join('products', 'stores.store_id', '=', 'products.store_id')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->join('sub_categories', 'products.id_subcategory', '=', 'sub_categories.id_subcategory')
        ->where('products.id_product', '=', $idproduct)
        ->select('*')->first();

        $rekomendasi = DB::table('users')
        ->join('user_profiles', 'users.id_profile', '=', 'user_profiles.id_profile')
        ->join('stores', 'stores.store_id', '=', 'user_profiles.store_id')
        ->join('products', 'stores.store_id', '=', 'products.store_id')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->join('sub_categories', 'products.id_subcategory', '=', 'sub_categories.id_subcategory')
        ->where('stores.store_id', '=', $idstore)->get()->random(3);

        $data = [
            'category'=> $category,
            'subcategory'=> $subcategory,
            'product'=> $product,
            'rekomendasi' => $rekomendasi
        ];

        return view('beranda.detail', $data);
    }
}
