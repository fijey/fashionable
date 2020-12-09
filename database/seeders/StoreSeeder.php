<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newStore = \App\Models\Store::find(1);
        $newStore->store_name = "BatuBara Jeans";
        $newStore->store_address = "Jati Pekalongan";
        $newStore->store_lazada = "www.lazada.co.id/profiles";
        $newStore->store_tokopedia = "www.tokopedia.co.id/profiles";
        $newStore->store_shopee = "www.shopee.co.id/profiles";
        $newStore->store_bukalapak = "www.bukalapak.co.id/profiles";
        $newStore->update();
    }
}
