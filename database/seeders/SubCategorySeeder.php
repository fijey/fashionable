<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategory = new \App\Models\SubCategory;
        $subcategory->subcategory_name = "Baju";
        $subcategory->save();
        $subcategory = new \App\Models\SubCategory;
        $subcategory->subcategory_name = "Celana";
        $subcategory->save();
        $subcategory = new \App\Models\SubCategory;
        $subcategory->subcategory_name = "Sepatu";
        $subcategory->save();
        $subcategory = new \App\Models\SubCategory;
        $subcategory->subcategory_name = "Sendal";
        $subcategory->save();
        $subcategory = new \App\Models\SubCategory;
        $subcategory->subcategory_name = "Topi";
        $subcategory->save();
        $subcategory = new \App\Models\SubCategory;
        $subcategory->subcategory_name = "Kaos Kaki";
        $subcategory->save();
        $subcategory = new \App\Models\SubCategory;
        $subcategory->subcategory_name = "Dalaman";
        $subcategory->save();
    }
}
