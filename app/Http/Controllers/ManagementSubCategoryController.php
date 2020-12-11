<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubCategory;

class ManagementSubCategoryController extends Controller
{
    public function index() {

        $subcategory = SubCategory::all();
        
        $data = [
            'subcategory' => $subcategory
        ];

        return view('subcategory.index', $data);

    }

    public function deleteSubCategory($id) {

        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        return redirect('/subcategory')->with('success', 'Sub kategori telah Dihapus');
    }

    public function addSubCategory(Request $request) {

        $category = SubCategory::create($request->all());
        $category->save();

        return redirect('/subcategory')->with('success', 'Sub Kategori baru sudah ditambahkan!');
    }
}
