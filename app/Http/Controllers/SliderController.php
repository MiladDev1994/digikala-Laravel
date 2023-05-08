<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\homeView;
use App\Models\SellerRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function admin_home_slider(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $sliders = Slider::with('category')->orderBy('id' , 'desc')->get();
        $categories = Category::all();
        return view('admin.home.slider' , compact('sliders' , 'categories' , 'countRequest'));
    }

    public function admin_home_slider_create(Request $request){
        $request->validate([
            'pictureSlider'=>'required|image|mimes:jpg,jpeg|dimensions:ratio=2880/600',
            'groupSlider'=>'required',
        ]);

        Slider::create([
            'image'=>Storage::put('home/slider' , $request->pictureSlider),
            'group_id'=>$request->groupSlider,
        ]);

        return back();
    }

    public  function admin_home_slider_destroy(Slider $slider){
        Slider::destroy($slider->id);

        return back();
    }

}
