<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id_user',
        'id_product',
        'qty',
        'total',
        'status',
        'grand_total'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class,'id_product');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
