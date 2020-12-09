<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {

        $category = Category::all();


       

        $data = [
            'category'=> $category
        ];

        return view('beranda.index', $data);
    }
}
