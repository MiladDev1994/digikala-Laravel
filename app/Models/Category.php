<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
//
    protected $fillable = ['name' , 'parent_id' , 'level' , 'logo', 'special', 'image'];

    public function child(){
        return $this->hasMany(Category::class ,'parent_id' , 'id');
    }

    public function parent(){
        return $this->hasMany(Category::class ,'id' , 'parent_id');
    }

    public function slider(){
        return $this->belongsTo(Slider::class);
    }


//    public function productB(){
//        return $this->belongsToMany(Product::class);
//    }


    public function products()
    {
        return $this->morphedByMany(Product::class , 'categoryable');
    }


    public function varieties()
    {
        return $this->morphedByMany(Variety::class , 'categoryable');
    }



}
