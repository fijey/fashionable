<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\Store;
use App\Models\User;
use Auth;
use DB;
class UserProfileController extends Controller
{
    public function index() {
        // $userlogin = Auth::user()->id;

        // $profile = DB::select('SELECT * FROM users JOIN user_profiles ON users.id_profile = user_profiles.id_profile
        // JOIN stores on user_profiles.store_id = stores.store_id where users.id='.$userlogin);

        $data = [
        ];


        return view('userprofile.index', $data);
    }

    public function editProfile(Request $request){

        $request->validate([
            
        ]);

        $profile = UserProfile::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);
        $user->update($request->all());
        $profile->update($request->all());

        $pathimg = $request->get('name');
            $newstr = preg_replace('/\s/', '', $pathimg);
            $path = "img/ImageProfile/$newstr/";

		if ($request->hasfile('img_profile')) {
			$request->file('img_profile')->move('img/ImageProfile/' . $newstr, $request->file('img_profile')->getClientOriginalName());
			$profile->img_profile = $path . $request->file('img_profile')->getClientOriginalName();
			$profile->update();
        }


        return redirect('/myprofile');




    }

    public function editStore(Request $request){

        $request->validate([
            
        ]);

        $store = Store::find(Auth::user()->id);
        $store->update($request->all());

        $pathimg = Auth::user()->name;
            $newstr = preg_replace('/\s/', '', $pathimg);
            $path = "img/ImageStore/$newstr/";

		if ($request->hasfile('store_img')) {
			$request->file('store_img')->move('img/ImageStore/' . $newstr, $request->file('store_img')->getClientOriginalName());
            $store->store_img = $path . $request->file('store_img')->getClientOriginalName();
			$store->update();
        }


        return redirect('/myprofile');




    }
}
