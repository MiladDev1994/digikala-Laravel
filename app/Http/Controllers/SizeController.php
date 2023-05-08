<?php

namespace App\Http\Controllers;

use App\Models\SellerRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function admin_variations_size(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $sizes = Size::all();
        return view('admin.variations.sizes.index' , compact('sizes' , 'countRequest'));
    }

    public function admin_variations_size_store(Request $request){
        $request->validate([
            'size'=>'required|unique:sizes',
        ]);

        Size::create([
            'size'=>$request->size,
        ]);

        return back();
    }
}
