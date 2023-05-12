<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'client_id',
        'payment',
        'confirmation',
        'total',
        'subtotal',
        'tax',
        'quantity',
        'price',
        'name',
        'image',
    ];
    public function produits()
    {
        return $this->belongsTo(Produits::class ,'id_product');
    }
    public function clients()
    {
        return $this->belongsTo(Clients::class ,'client_id');
    }
}
