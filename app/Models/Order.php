<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_val',
        'buyer_id',
        'variety_id',
        'number',
        'price',
        'pay_status',
        'date',
        'time',
        'address',
        'phone',
        'order_status',
    ];

    public function variety(){
        return $this->hasMany(Variety::class , 'id' , 'variety_id');
    }

    public function user(){
        return $this->hasMany(User::class , 'id' , 'buyer_id');
    }
}
