<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['subject' , 'Introduction' , 'about1' , 'about2' , 'about3' , 'about4' , 'product_id' , 'file' , 'logo', 'special'];

    public function product(){
        return $this->hasOne(Product::class , 'id');
    }
}
