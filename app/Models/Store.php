<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;


    protected $fillable = [
        'store_name',
        'store_address',
        'store_img',
        'store_img_banner',
        'store_lazada',
        'store_shopee',
        'store_tokopedia',
        'store_bukalapak',
        'store_about',
    ];

    protected $primaryKey = 'store_id';

    public function user() {
        return $this->hashOne(UserProfile::class);
    }
    public function product() {
        return $this->belongsTo(Product::class, 'store_id', 'store_id');
    }

}
