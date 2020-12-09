<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'address',
        'age',
        'img_profile',
        'handphone',
        'id_store'
    ];

    protected $primaryKey = 'id_profile';

    public function user() {
        return $this->hashOne(User::class);
    }

    public function store() {

        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }
}
