<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favorite_insert(Request $request){

        Favorite::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product,
        ]);

    }

    public function favorite_destroy(Request $request){
        $favorite = Favorite::query()->where('user_id' , auth()->user()->id)->where('product_id' , $request->product)->get();
        Favorite::destroy($favorite[0]->id);
    }
}
