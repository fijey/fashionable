<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    protected $primaryKey = ('id_category');

    public function product(){
        
        return $this->belongsTo(Product::class, 'id_category', 'id_category');
        
    }
}
