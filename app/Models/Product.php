<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'dkp',
        'name',
        'brand_id',
        'about',
        'variety_type',
        'user_id',
        'width',
        'height',
        'depth',
        'Weight',
        'active',
        'massage',
        'image',

    ];

    protected $primaryKey = 'id';

    public function categories(){
        return $this->belongsTo(Category::class , 'group_id' );
    }
    public function childd(){
        return $this->belongsTo(Category::class ,'group_id' , 'id');
    }

    public function Bcategories(){
        return $this->belongsToMany(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class , 'brand_id');
    }
    public function variation(){
        return $this->hasMany(Variety::class , 'dkp' , 'dkp');
    }



    public function variations(){
        return $this->hasMany(Variety::class , 'dkp' , 'dkp')->where('special' , 1)->orderBy('price_off');
    }




//    releation between products & category
    public function Ccategories()
    {
        return $this->morphToMany(Category::class , 'categoryable');
    }



}
