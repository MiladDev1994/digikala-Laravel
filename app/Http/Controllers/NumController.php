<?php

namespace App\Http\Controllers;

use App\Models\Num;
use App\Models\SellerRequest;
use Illuminate\Http\Request;

class NumController extends Controller
{
    public function admin_variations_num(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $numbers = Num::all();
        return view('admin.variations.numbers.index' , compact('numbers' , 'countRequest'));
    }

    public function admin_variations_num_store(Request $request){
        $request->validate([
            'number'=>'required|unique:nums',
        ]);

        Num::create([
            'number'=>$request->number,
        ]);

        return back();
    }
}
