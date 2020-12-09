<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_name'
    ];

    protected $primaryKey = ('id_subcategory');

    public function product(){
        
        return $this->belongsTo(Product::class, 'id_subcategory', 'id_subcategory');
        
    }

}
