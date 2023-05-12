<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit',
        'slug',
        'description_pro',
        'stock_status',
        'prix',
        'quantity',
        'category_id',
        'image',
    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class ,'category_id');
    }
    public function carts()
    {
        return $this->hasMany(Carts::class ,'id_product');
    }
}
