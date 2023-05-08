<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'period' , 'image'];

//    public function variations(){
//        return $this->hasMany(Variety::class , 'Warranty');
//    }
}
