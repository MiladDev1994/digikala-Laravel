<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\SellerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function admin_brands(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $brands = Brand::all();
        return view('admin.variations.brands.index' , compact('brands' , 'countRequest'));
    }

    public function admin_brands_store(Request $request){
        $request->validate([
            'name'=>'required|unique:brands,name',
            'logo'=>'required|mimes:png|dimensions:ratio=1/1',
            'national'=>'required',
            'about'=>'required',
        ]);

        Brand::create([
            'name'=>$request->name,
            "logo"=>Storage::put('variations/brands' , $request->logo),
            'national'=>$request->national,
            'about'=>$request->about,
            'special'=>0,
        ]);

        return back();
    }


    public function admin_brands_update(Request $request){
        $brands = Brand::all();

        for ($v = 1; $v <= count($brands); $v++){
            $bra = "act".$v;
            if (isset($request->$bra) ){
                Brand::where('id' , $v)->update(['special'=> 1]);
            }else{
                Brand::where('id' , $v)->update(['special'=> 0]);
            }
        }

        return back();
    }
}
