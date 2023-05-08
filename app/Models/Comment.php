<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['product_id' , 'user_id' , 'text' , 'proposal' , 'active' , 'score' , 'titr'];

    public function product(){
        return $this->hasMany(Product::class , 'id' , 'product_id');
    }

    public function user(){
        return $this->hasMany(User::class , 'id' , 'user_id');
    }
}
