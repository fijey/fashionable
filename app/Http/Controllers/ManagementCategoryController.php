<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ManagementCategoryController extends Controller
{
    public function index() {

        $category = Category::all();

        $data = [
            'category' => $category
        ];


        return view('category.index', $data);
    }

    public function addCategory(Request $request) {

        $category = Category::create($request->all());
        $category->save();

        return redirect('/category')->with('success', 'Kategori baru sudah ditambahkan!');
    }

    public function deleteCategory($id){

        $category = Category::where('id_category', $id);
        $category->delete();

        return redirect('/category')->with('success', 'Kategori berhasil dihapus');
    }

}
