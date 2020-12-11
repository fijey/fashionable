<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use DB;
use \App\Models\Category;
use \App\Models\SubCategory;

class MyProductController extends Controller
{
    public function index() {
        // $ProductUser = Product::where('store_id', '=', Auth::user()->profile->store->store_id)->get();

        $product_user = DB::table('products')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->where('products.store_id', '=', Auth::user()->profile->store->store_id)
        ->select('products.*', 'categories.category_name')
        ->get();


        $data = [
            'product_user' => $product_user
        ];
        return view('myproduct.index', $data);
    }

    public function addProduct() {

        $getcategory= Category::all();
        $getsubcategory= SubCategory::all();

        $data = [
            'subcategory'=> $getsubcategory,
            'category'=> $getcategory
        ];

        return view('myproduct.add', $data);
    }
    public function postProduct(Request $request) {

        $request->validate([
            'id_category' => 'required',
            'id_subcategory' => 'required',
            'product_name' => 'required',
            'product_condition' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_img1' => 'required',
            'product_img2' => 'required',
            'product_img3' => 'required',
        ]);

       $product = new \App\Models\Product;
       $product->store_id = Auth::user()->profile->store->store_id;
       $product->id_category = $request->id_category;
       $product->id_subcategory = $request->id_subcategory;
       $product->product_name = $request->product_name;
       $product->product_brand = $request->product_brand;
       $product->product_condition = $request->product_condition;
       $product->product_price = $request->product_price;
       $product->product_description = $request->product_description;
       $product->product_lazada = $request->product_lazada;
       $product->product_tokopedia = $request->product_tokopedia;
       $product->product_shopee = $request->product_shopee;
       $product->product_bukalapak = $request->product_bukalapak;

       if ($request->product_lazada == NULL && $request->product_shopee == NULL && $request->product_tokopedia == NULL && $request->product_bukalapak == NULL) {

           return redirect()->back()->with('danger', ' Isi setidaknya satu link produk di E-Commerce');
       }

       $product->product_img1 = $request->product_img1;
       $product->product_img2 = $request->product_img2;
       $product->product_img3 = $request->product_img3;
       $product->save();

       $pathimg = Auth::user()->name;
       $newstr = preg_replace('/\s/', '', $pathimg);
       $path = "img/ImageStore/$newstr/";

   if ($request->hasfile('product_img1')) {
       $request->file('product_img1')->move('img/ImageStore/' . $newstr, $request->file('product_img1')->getClientOriginalName());
       $product->product_img1 = $path . $request->file('product_img1')->getClientOriginalName();
       $product->update();
   }
   if ($request->hasfile('product_img2')) {
       $request->file('product_img2')->move('img/ImageStore/' . $newstr, $request->file('product_img2')->getClientOriginalName());
       $product->product_img2 = $path . $request->file('product_img2')->getClientOriginalName();
       $product->update();
   }
   if ($request->hasfile('product_img3')) {
       $request->file('product_img3')->move('img/ImageStore/' . $newstr, $request->file('product_img3')->getClientOriginalName());
       $product->product_img3 = $path . $request->file('product_img3')->getClientOriginalName();
       $product->update();
   }

        return redirect('/myproduct')->with('success', 'Produk Sudah Di Publish');
    }

    public function deleteProduct($id) {

        $product = Product::find($id);
        $product->delete();

        return redirect('/myproduct')->with('success', 'Produk sudah dihapus!');

    }

    public function editProduct($id){


        $product = Product::where('id_product', $id)->get();
        $getcategory= Category::all();

        $data = [
            'product'=> $product,
            'category'=> $getcategory
        ];

        return view('myproduct.edit',$data);

    }

    public function updateProduct(Request $request, $id){

        $request->validate([
            'id_category' => 'required',
            'product_name' => 'required',
            'product_brand' => 'required',
            'product_condition' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        $pathimg = Auth::user()->name;
        $newstr = preg_replace('/\s/', '', $pathimg);
        $path = "img/ImageStore/$newstr/";

        if ($request->hasfile('product_img1')) {
            $request->file('product_img1')->move('img/ImageStore/' . $newstr, $request->file('product_img1')->getClientOriginalName());
            $product->product_img1 = $path . $request->file('product_img1')->getClientOriginalName();
            $product->update();
        }
        if ($request->hasfile('product_img2')) {
            $request->file('product_img2')->move('img/ImageStore/' . $newstr, $request->file('product_img2')->getClientOriginalName());
            $product->product_img2 = $path . $request->file('product_img2')->getClientOriginalName();
            $product->update();
        }
        if ($request->hasfile('product_img3')) {
            $request->file('product_img3')->move('img/ImageStore/' . $newstr, $request->file('product_img3')->getClientOriginalName());
            $product->product_img3 = $path . $request->file('product_img3')->getClientOriginalName();
            $product->update();
        }

        return redirect('/myproduct')->with('success', 'Produk Telah diubah');




    }
}
