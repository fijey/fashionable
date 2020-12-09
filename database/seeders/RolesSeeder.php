<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = new \App\Models\Role;
        $roles->name = "Admin";
        $roles->guard_name = "web";
        $roles->save();

        $roles = new \App\Models\Role;
        $roles->name = "User";
        $roles->guard_name = "web";
        $roles->save();
    }
}
