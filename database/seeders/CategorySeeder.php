<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category;
        $category->category_name = "Fashion Pria";
        $category->save();

        $category = new \App\Models\Category;
        $category->category_name = "Fashion Wanita";
        $category->save();

        $category = new \App\Models\Category;
        $category->category_name = "Fashion Bayi";
        $category->save();
    }
}
