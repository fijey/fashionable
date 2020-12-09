<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product = new \App\Models\Product;
        $product->store_id = 1;
        $product->id_category = 2;
        $product->product_name = "Celana Levis Mamaboga";
        $product->product_price = 10000;
        $product->product_description = "Celana mamaboga dalah sebuah celana yang mampu memberikan nuansa berbeda ketika";
        $product->product_condition = "Baru";
        $product->product_brand = "Nike";
        $product->save();
    
    }
}
