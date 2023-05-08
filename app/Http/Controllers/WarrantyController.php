<?php

namespace App\Http\Controllers;

use App\Models\SellerRequest;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WarrantyController extends Controller
{
    public function admin_warranties(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $guarantees = Warranty::all();
        return view('admin.variations.guarantees.index' , compact('guarantees' , 'countRequest'));
    }


    public function admin_warranties_store(Request $request){

        $request->validate([
            'name'=>'required',
            'document'=>'required|mimes:jpg',
            'period'=>'required',
        ]);

        Warranty::create([
            'name'=>$request->name,
            'period'=>$request->period,
            'image'=>Storage::put('variations/guarantees' , $request->document),
        ]);

        return back();
    }
}
