<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DashboardController;
use Spatie\Permission\Models\Role;
use App\Models\User; 
use App\Models\Store; 
use App\Models\Product; 

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $user= User::count();
        $store= Store::count();
        $product= Product::count();

        $l_product = product::limit(5)->get();

        $l_user = User::join('user_profiles', 'users.id_profile', '=', 'user_profiles.id_profile')->limit(5)->orderby('id', 'DESC')->get();

        $data = [
            'user' => $user,
            'store' => $store,
            'product' => $product, 
            'l_user' => $l_user,
            'l_product' => $l_product
        ];

        if (auth()->guard('web')->check()) {
            return view('dashboard.index', $data);
        }

        return redirect('/login');
        
    }
}
