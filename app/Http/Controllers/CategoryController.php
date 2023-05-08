<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\SellerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function admin_categories(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $categories = Category::all();

        $ajaxSpecial = [];
        foreach ($categories as $category){
            if ($category->level != 1){
                array_push($ajaxSpecial , $category->id);
            }
        }


        $catId = json_encode($ajaxSpecial);
//        dd($ajaxSpecial);
        return view('admin.categories.index' , compact('categories' , 'catId' , 'countRequest'));
    }




    public function categories_create(Category $category){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $categories = Category::query()->orderby('level')->get();
        return view('admin.categories.create' , compact('categories' , 'category' , 'countRequest'));
    }


    public function categories_store(Request $request , Category $category){



        $level = Category::query()->where('id' , $request->category_id)->get();
        $request->validate([
            "name"=>"required",
            "image"=>'required|mimes:png|dimension:ratio=1/1',
        ]);


        Category::create([
            'name'=>$request->name,
            'parent_id'=>$request->category_id,
            'logo'=>0,
            'image'=>Storage::put('categories' , $request->image),
            'level'=>$level[0]->level+1,
            'special'=>0,
        ]);
        return back();


//        dd($level[0]->level);
    }





    public function categories_createHead(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $categories = Category::query()->orderby('level')->get();
        return view('admin.categories.createHead' , compact('categories' , 'countRequest'));
    }

    public function categories_storeHead(Request $request){

        $level = Category::query()->where('id' , $request->parent)->get();
        $request->validate([
            "name"=>"required",
            "logo"=>'required|mimes:svg',
            "image"=>'required|mimes:png|dimension:ratio=1/1',
        ]);


        Category::create([
            'name'=>$request->name,
            'parent_id'=>0,
            'logo'=>Storage::put('categories' , $request->logo),
            'image'=>Storage::put('categories' , $request->image),
            'level'=>1,
            'special'=>0,
        ]);

        return back();
    }


    public function categories_special(Request $request){

        Category::where('id' , $request->category)->update(['special'=>$request->active]);
//        dd($request);
    }

}
