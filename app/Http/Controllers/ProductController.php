<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Num;
use App\Models\Product;
use App\Models\SellerRequest;
use App\Models\Size;
use App\Models\Variety;
use App\Models\Volume;
use App\Models\Warranty;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function admin_products(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $products = Product::query()->with('Ccategories')->orderBy('id' , 'desc')->get();
        $productCategory = [];
        foreach ($products as $product){
            $product->{'category_id'} = $product->Ccategories[0]->id;
            $product->{'category_name'} = $product->Ccategories[0]->name;
            $product->{'brand_name'} = $product->brand->name;
            array_push($productCategory , $product);
        }
        $ttt = json_encode($productCategory);
        return view('admin.products.index' , compact('products' , 'productCategory' , 'ttt' , 'countRequest'));
    }

    public function admin_products_update(Request $request){
        Product::where('id' , $request->product)->update([
            'active'=> $request->active,
        ]);
    }

    public function admin_products_create(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $brands = Brand::all();
        $groups = Category::all();
        return view('admin.products.create' , compact('brands' , 'groups' , 'countRequest'));
    }

    public function admin_products_store(Request $request){
        $products = Product::all();
        $countProduct = count($products)+1001;
        $request->validate([
            'name'=>'required',
            'facke'=>'required',
            'brand'=>'required',
            'variety'=>'required',
            'width'=>'required',
            'height'=>'required',
            'depth'=>'required',
            'Weight'=>'required',
            'mainImage'=>'required|mimes:jpg|dimensions:ratio=1/1',
        ]);
        $allImage = [Storage::put('products/'.$countProduct , $request->mainImage) . ','];
        if ($request->image){
            foreach ($request->image as $event){
                $save = Storage::put('products/'.$countProduct , $event) . ',';

                array_push($allImage , $save);
            }
        }
        $lll = implode($allImage);
        if ($request->active == 'on'){
            $active = 1;
        }else{
            $active = 0;
        }
        $category = Product::create([
            'dkp'=>$countProduct,
            'name'=>$request->name,
            'brand_id'=>$request->brand,
            'about'=>$request->about,
            'variety_type'=>$request->variety,
            'user_id'=>auth()->user()->id,
            'width'=>$request->width,
            'height'=>$request->height,
            'depth'=>$request->depth,
            'Weight'=>$request->Weight,
            'active'=>$active,
            'image'=>$lll,
        ]);
        $category->Ccategories()->sync($request->facke);
        return back();
    }



    public function admin_products_addVar(Product $product){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $colors = Color::all();
        $sizes = Size::all();
        $weights = Weight::all();
        $volumes = Volume::all();
        $Warrantys = Warranty::all();
        $numbers = Num::all();
        $varieties = Variety::query()->where('dkp' , $product->dkp)->where('user_id' , auth()->user()->id)->get();

        $variety = [];
        foreach ($varieties as $item){
            array_push($variety , $item->variety);
        }
        return view('admin.products.variations.create' , compact(['product' ,'colors' , 'sizes' , 'weights' , 'volumes' , 'Warrantys' , 'numbers' , 'variety' , 'countRequest']));
    }

    public function admin_products_addVar_store(Request $request){
        $var = Variety::all();
        $varCount = count($var)+10000;

        $request->validate([
            'price'=>'required',
            'number'=>'required',
            'variety'=>'required',
        ]);

        if ($request->active == 'on'){
            $active = 1;
        }else{
            $active = 0;
        }

        if ($request->spesial == 'on'){
            $spesial = 1;
        }else{
            $spesial = 0;
        }
        if ($request->moreSell == 'on'){
            $moreSell = 1;
        }else{
            $moreSell = 0;
        }

        if ($request->price_off == null){
            $price_off = $request->price;
        }else{
            $price_off = $request->price_off;
        }


        $category = Variety::create([
            'dkpc'=>$varCount,
            'dkp'=>$request->dkp,
            'variety'=>$request->variety,
            'shipping_time'=>$request->ship,
            'access'=>1,
            'remain'=>$request->number,
            'price'=>$request->price,
            'price_off'=>$price_off,
            'number'=>$request->number,
            'reserve_num'=>0,
            'active'=>$active,
            'special'=>$spesial,
            'Warranty'=>$request->Warranty,
            'moreSell'=>$moreSell,
            'brand_id'=>$request->brand,
            'user_id'=>auth()->user()->id,

        ]);

        $category->categories()->sync($request->categories);


        return back();

    }



    public function admin_products_addPic(Product $product){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        return view('admin.products.edit' , compact('product' , 'countRequest'));
    }


    public function admin_products_addPic_store(Product $product, Request $request){
        $request->validate([
            'addPic'=>'required',
        ]);

        $allImage = [];

        foreach ($request->addPic as $event){
            $save = Storage::put('products/'.$product->dkp , $event) . ',';

            array_push($allImage , $save);
        }

        $lll =$request->namePast.implode($allImage);

        Product::where('id' , $product->id)->update([
            'image'=>$lll,
        ]);

        return back();
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




    public function admin_varieties(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $variaties = Variety::query()->with('categories')->with('warr')->with('products')->orderBy('id' , 'desc')->get();
        $comVar = [];
        foreach ($variaties as $variaty){
            $variaty->{'category_id'} = $variaty->categories[0]->id;
            $variaty->{'product_id'} = $variaty->product->id;
            $variaty->{'role'} = $variaty->user->role;
            $variaty->{'category_name'} = $variaty->categories[0]->name;
            $variaty->{'image'} = $variaty->products->image;
            $variaty->{'name'} = $variaty->products->name;
            $variaty->{'warranty_time'} = $variaty->warr->name;
            $variaty->{'user_id'} = $variaty->user_id;
            $variaty->{'auth_id'} = auth()->user()->id;
            if ($variaty->products->variety_type == 'color'){
                $variaty->{'var_name'} = $variaty->color->name;
            }elseif ($variaty->products->variety_type == 'size'){
                $variaty->{'var_name'} = $variaty->size->size;
            }elseif ($variaty->products->variety_type == 'Weight'){
                $variaty->{'var_name'} = $variaty->Weight->weight;
            }elseif ($variaty->products->variety_type == 'volume'){
                $variaty->{'var_name'} = $variaty->volume->volume;
            }elseif ($variaty->products->variety_type == 'number'){
                $variaty->{'var_name'} = $variaty->num->number;
            }elseif ($variaty->products->variety_type == 'null'){
                $variaty->{'var_name'} = '';
            }
            array_push($comVar , $variaty);
        }
        $varJson = json_encode($comVar);
        return view('admin.products.variations.index' , compact('varJson' , 'variaties' , 'countRequest'));
    }


    public function admin_varieties_access(Request $request){
        Variety::where('id' , $request->variety)->update([
            'access'=>$request->active,
        ]);
    }

    public function admin_varieties_values(Request $request){
        $variety = Variety::query()->where('id' , $request->variety)->get();
        Variety::where('id' , $request->variety)->update([
            'shipping_time'=>$request->AjaxsentTime,
            'price'=>str_replace(',' , '' , $request->AjaxpriceBox),
            'price_off'=>str_replace(',' , '' , $request->AjaxpriceOffBox),
            'number'=>$request->AjaxNumberBox,
        ]);

        if ($variety[0]->number > $request->AjaxNumberBox){
            Variety::where('id' , $request->variety)->update([
                'remain'=> $variety[0]->remain - ($variety[0]->number - $request->AjaxNumberBox),
            ]);
        }elseif ($variety[0]->number === $request->AjaxNumberBox){
            Variety::where('id' , $request->variety)->update([
                'remain'=> $variety[0]->remain ,
            ]);
        }elseif ($variety[0]->number < $request->AjaxNumberBox){
            Variety::where('id' , $request->variety)->update([
                'remain'=> $variety[0]->remain + ($request->AjaxNumberBox - $variety[0]->number),
            ]);
        }
    }

    public function admin_varieties_active(Request $request){
        Variety::where('id' , $request->variety)->update([
            'active'=> $request->active,
        ]);
    }









    public function admin_varieties_MSell(Request $request){
        Variety::where('id' , $request->variety)->update([
            'moreSell'=> $request->active,
        ]);
    }

    public function admin_varieties_special(Request $request){
        Variety::where('id' , $request->variety)->update([
            'special'=> $request->active,
        ]);
    }

}
