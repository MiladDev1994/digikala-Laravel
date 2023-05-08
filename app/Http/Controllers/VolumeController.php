<?php

namespace App\Http\Controllers;

use App\Models\SellerRequest;
use App\Models\Volume;
use Illuminate\Http\Request;

class VolumeController extends Controller
{
    public function admin_variations_volume(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $volumes = Volume::all();
        return view('admin.variations.volumes.index' , compact('volumes' , 'countRequest'));
    }


    public function admin_variations_volume_store(Request $request){
        $request->validate([
            'volume'=>'required|unique:volumes',
        ]);

        Volume::create([
            'volume'=>$request->volume,
        ]);

        return back();
    }
}
