<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'billing_address',
        'city',
        'state',
        'zipcode',
        'phone',
        'note',
    ];
    public function user()
    {
        return $this->belongsTo(User::class ,'id_user');
    }
    public function carts()
    {
        return $this->hasMany(Carts::class ,'client_id');
    }

}
