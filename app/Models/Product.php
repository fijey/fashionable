<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'store_id', 'id_category', 'id_subcategory', 'product_name', 'product_price', 'product_description', 'product_img1', 'product_img2','product_img3', 'product_condition', 'product_brand',
        'product_lazada', 'product_tokopedia', 'product_bukalapak', 'product_shopee'
    ];

    protected $primaryKey= 'id_product';

    public function store() {
        return $this->hashOne(Store::class);
    }

    public function category(){
        return $this->hashOne(Category::class);
    }
    public function subcategory(){
        return $this->hashOne(SubCategory::class);
    }
}
