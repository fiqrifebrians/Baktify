<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'id_category',
        'price',
        'description',
        'stock',
        'image'
    ];


    public function Category()
    {
        return $this->belongsTo(Category::class,'id_category');
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }
}
