<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DashboardController;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        if (auth()->guard('web')->check()) {
            return view('dashboard.index');
        }

        return redirect('/login');
        
    }
}
