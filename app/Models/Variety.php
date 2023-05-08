<?php

namespace App\Models;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    protected $fillable = [
        'dkpc',
        'dkp',
        'variety',
        'shipping_time',
        'access',
        'remain',
        'price',
        'price_off',
        'number',
        'reserve_num',
        'active',
        'special',
        'user_id',
        'Warranty',
        'moreSell',
        'brand_id',

    ];

    public function warranty(){
        return $this->belongsTo(Warranty::class , 'Warranty');
    }

    public function warr(){
        return $this->belongsTo(Warranty::class , 'Warranty');
    }

    public function color(){
        return $this->belongsTo(Color::class , 'variety');
    }
    public function size(){
        return $this->belongsTo(Size::class , 'variety');
    }

    public function Weight(){
        return $this->belongsTo(Weight::class , 'variety');
    }
    public function volume(){
        return $this->belongsTo(Volume::class , 'variety');
    }
    public function num(){
        return $this->belongsTo(Num::class , 'variety');
    }

    public function product(){
        return $this->belongsTo(Product::class , 'dkp' , 'dkp');
    }

    public function brand(){
        return $this->belongsTo(Brand::class , 'brand_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }



    public function products(){
        return $this->belongsTo(Product::class , 'dkp' , 'dkp');
    }



    //    releation between variety & category


    public function categories()
    {
        return $this->morphToMany(Category::class , 'categoryable');
    }

}
