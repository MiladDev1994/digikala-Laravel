<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\SellerRequest;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function admin_variations_color(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $colors = Color::all();
        return view('admin.variations.colors.index' , compact('colors' , 'countRequest'));
    }

    public function admin_variations_color_store(Request $request){

        $request->validate([
            'name'=>'required|unique:colors',
        ]);

        Color::create([
            'name'=>$request->name,
            'color'=>$request->color,
        ]);

        return back();
    }
}
