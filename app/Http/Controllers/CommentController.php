<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request , Product $product , $user){
        $request->validate([
            'text'=>'required',
            'proposal'=>'required',
        ]);

        if($request->proposal == 'ok'){
            $proposal = 1 ;
        }else{
            $proposal = 0 ;
        }
        Comment::create([
            'product_id'=>$product->id,
            'user_id'=>$user,
            'text'=>$request->text,
            'titr'=>$request->titr,
            'proposal'=>$proposal,
            'active'=>0,
            'score'=>$request->score,
        ]);
//        dd($user);

        return back();
    }
}
