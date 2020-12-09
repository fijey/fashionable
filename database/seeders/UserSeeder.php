<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserProfile;
use App\Models\Store;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;

        $newStore = new Store;
        $newStore->save();

        $lastStore=DB::table('stores')->orderBy('store_id', 'DESC')->first();

        $newProfile = new UserProfile;
        $newProfile->store_id = $lastStore->store_id;
        $newProfile->save();

        $last_profile=DB::table('user_profiles')->orderBy('id_profile', 'DESC')->first();

        $user->name = "Fajar Mukti";
        $user->email = "fajarmukti9@gmail.com";
        $user->password = bcrypt('12345678');
        $user->id_profile = $last_profile->id_profile;
        $user->id_role = 1;
        $user->assignRole('Admin');
        $user->save();

        //user 2
        $user = new \App\Models\User;

        $newStore = new Store;
        $newStore->save();

        $lastStore=DB::table('stores')->orderBy('store_id', 'DESC')->first();
        
        $newProfile = new UserProfile;
        $newProfile->store_id = $lastStore->store_id;
        $newProfile->save();
        $last_profile=DB::table('user_profiles')->orderBy('id_profile', 'DESC')->first();

        $user->name = "Pipit Fitriani";
        $user->email = "pipit@gmail.com";
        $user->password = bcrypt('12345678');
        $user->id_profile = $last_profile->id_profile;
        $user->id_role = 2;
        $user->assignRole('User');
        $user->save();

    }
}
