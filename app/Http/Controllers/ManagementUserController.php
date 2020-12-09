<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\UserProfile;
use \App\Models\Store;
use DB;

class ManagementUserController extends Controller
{
    public function index() {
        $user = User::where('id_role', '!=', '1')->get();

        $data = [
            'user' => $user
        ];

        return view('managementuser.index', $data);
    }
    public function addUser() {
 
       return view('managementuser.add');
    }
    public function postUser(Request $request) {
 
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'retype_password' => 'required|min:8|same:password',
            'store_name'=> 'required'
        ]);

        $user = new User;

        $userstore= new Store;
        $userstore->store_name = $request->store_name;
        $userstore->store_address = $request->store_address;
        $userstore->store_about = $request->store_about;
        $userstore->store_lazada = $request->store_lazada;
        $userstore->store_img = $request->store_img;
        $userstore->store_tokopedia = $request->store_tokopedia;
        $userstore->store_shopee = $request->store_shopee;
        $userstore->store_bukalapak = $request->store_bukalapak;
        $userstore->save();
        $last_store=DB::table('stores')->orderBy('store_id', 'DESC')->first();

        $userprofile = new UserProfile;
        $userprofile->store_id = $last_store->store_id;
        $userprofile->address = $request->address;
        $userprofile->age = $request->age;
        $userprofile->city = $request->city;
        $userprofile->img_profile = $request->img_profile;
        $userprofile->handphone = $request->handphone;
        $userprofile->save();
        $last_profile=DB::table('user_profiles')->orderBy('id_profile', 'DESC')->first();

        $user->id_profile = $last_profile->id_profile;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = 2;
        $user->AssignRole('User');
        $user->save();
        

        return redirect('/managementuser')->with('success', 'pengguna berhasil ditambah');
    }

    public function deleteUser($id) {

        $user = User::find($id);
        $user->delete();

        return redirect('/managementuser')->with('success', 'Pengguna berhasil dihapus!');
    }

    public function editUser($id) {

        $user = DB::table('users')
        ->join('user_profiles', 'users.id_profile', '=', 'user_profiles.id_profile')
        ->join('stores', 'stores.store_id', '=', 'user_profiles.store_id')
        ->where('users.id', '=', $id)
        ->select('*')
        ->get();

        $data = [
            'user' => $user
        ];


        return view('managementuser.edit', $data);
    }
    public function postEdit(Request $request, $id) {

        $user = User::find($id);
        $user->update($request->all());
        $user = Store::find($id);
        $user->update($request->all());
        $user = UserProfile::find($id);
        $user->update($request->all());

        $pathimg = $request->get('name');
        $newstr = preg_replace('/\s/', '', $pathimg);
        $path = "img/ImageProfile/$newstr/";

    if ($request->hasfile('img_profile')) {
        $request->file('img_profile')->move('img/ImageProfile/' . $newstr, $request->file('img_profile')->getClientOriginalName());
        $profile->img_profile = $path . $request->file('img_profile')->getClientOriginalName();
        $profile->update();
    }

        $pathimg = Auth::user()->name;
        $newstr = preg_replace('/\s/', '', $pathimg);
        $path = "img/ImageStore/$newstr/";

    if ($request->hasfile('store_img')) {
        $request->file('store_img')->move('img/ImageStore/' . $newstr, $request->file('store_img')->getClientOriginalName());
        $store->store_img = $path . $request->file('store_img')->getClientOriginalName();
        $store->update();
}


        return redirect('/managementuser')->with('success', 'User berhasil diedit');


        return view('managementuser.edit', $data);
    }
}
