<?php

namespace App\Http\Controllers;

use App\Models\SellerRequest;
use App\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function admin_variations_weight(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $weights = Weight::all();
        return view('admin.variations.weights.index' , compact('weights' , 'countRequest'));
    }

    public function admin_variations_weight_store(Request $request){

        $request->validate([
            'weight'=>'required|unique:weights',
        ]);

        Weight::create([
            'weight'=>$request->weight,
        ]);

        return back();
    }
}
