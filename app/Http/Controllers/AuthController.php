<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Models\UserProfile;
use App\Models\Store;
use DB;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
                
            if (Auth::user()->profile->store->store_name == NULL) {

                return redirect('/createstore')->with('success', 'Yuk Buat dulu Tokomu');
            }
            
            return redirect('/dashboard');
       }

       return redirect('/login')->with('statusLogin', 'Email/Katasandi Salah');

    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }



    public function register(){
        return view('auth.register');
    }
    public function postRegister(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'retype_password' => 'required|min:8|same:password',
        ]);

        $newUser = new \App\Models\User;

        $newStore = new Store;
        $newStore->save();
        
        $last_store=DB::table('stores')->orderBy('store_id', 'DESC')->first();

        $newProfile = new UserProfile;
        $newProfile->store_id = $last_store->store_id;
        $newProfile->save();
        $last_profile=DB::table('user_profiles')->orderBy('id_profile', 'DESC')->first();
        $newUser->id_profile = $last_profile->id_profile;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->id_role = 2;
        $newUser->assignRole('User');
        $newUser->save();
        return redirect('/login');
    }

    public function createStore(){

        return view('auth.store');
    }
    public function postStore(Request $request){
        $request->validate([
            'store_name' => 'required|unique:stores',
            'store_address' => 'required',
            'store_about' => 'required'
        ]);

        $store = Store::find(Auth::user()->profile->store->store_id);
        $store->store_name = $request->store_name;
        $store->store_address = $request->store_address;
        $store->store_about = $request->store_about;
        $store->store_lazada = $request->store_lazada;
        $store->store_tokopedia = $request->store_tokopedia;
        $store->store_shopee = $request->store_shopee;
        $store->store_bukalapak = $request->store_bukalapak;
        $store->update();

        if ($store->store_lazada == NULL && $store->store_tokopedia == NULL && $store->store_shopee == NULL && $store->store_bukalapak == NULL ) {
            return redirect()->back()->with('danger', 'Isi setidaknya satu profile Ecommerce');
        }

        return redirect('/dashboard');
    }
}
