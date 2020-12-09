<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Reset cached roles and permissions
          app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          // create permissions
          Permission::create(['name' => 'crud profiles']);
          Permission::create(['name' => 'crud products']);
          Permission::create(['name' => 'dashboard']);
          Permission::create(['name' => 'management users']);
          Permission::create(['name' => 'management categories']);
          Permission::create(['name' => 'logout']);
  
          // create roles and assign created permissions
  
          // this can be done as separate statements
          $role = Role::create(['name' => 'Admin']);
          $role->givePermissionTo(Permission::all());
  
          // or may be done by chaining
          $role = Role::create(['name' => 'User'])
              ->givePermissionTo(['crud profiles', 'crud products', 'dashboard', 'logout']);
    }
}
