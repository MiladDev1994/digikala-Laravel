<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Massage;
use App\Models\Num;
use App\Models\Order;
use App\Models\Product;
use App\Models\SellerRequest;
use App\Models\Size;
use App\Models\User;
use App\Models\Variety;
use App\Models\Volume;
use App\Models\Warranty;
use App\Models\Weight;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    public function seller_dashboard(){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();
        $varieties = Variety::query()->where('user_id' , auth()->user()->id)->get();
        $varActive = 0;
        $varDeActive = 0;
        $varRemain = 0;
        $varRemainOff = 0;
        $varSpecial = 0;
        foreach ($varieties as $varietie){if ($varietie->active == 1){$varActive += 1;}}
        foreach ($varieties as $varietie){if ($varietie->active == 0){$varDeActive += 1;}}
        foreach ($varieties as $varietie){if ($varietie->remain > 0){$varRemain += 1;}}
        foreach ($varieties as $varietie){if ($varietie->remain == 0){$varRemainOff += 1;}}
        foreach ($varieties as $varietie){if ($varietie->special == 1){$varSpecial += 1;}}
        $varCount = count($varieties);


        $orderSeller = [];
        foreach ($varieties as $varietie){
            array_push($orderSeller , $varietie->id);
        }
        $orders = Order::query()->whereIn('variety_id' , $orderSeller)->get();
        $orNow = 0 ;
        $orSent = 0 ;
        $orCancel = 0 ;
        foreach ($orders as $order){if ($order->order_status == 'sending'){$orNow += 1;}}
        foreach ($orders as $order){if ($order->order_status == 'sent'){$orSent += 1;}}
        foreach ($orders as $order){if ($order->order_status == 'canceled'){$orCancel += 1;}}
        $orCount = count($orders);



        $products = Product::query()->where('user_id' , auth()->user()->id)->get();
        $proActive = 0;
        $proDeActive = 0;
        foreach ($products as $product){if ($product->active == 1){$proActive += 1;}}
        foreach ($products as $product){if ($product->active == 0){$proDeActive += 1;}}




        $ordersB = Order::query()->where('order_status' , 'sent')->whereIn('variety_id' , $orderSeller)->get();
        $sellDay = 0;
        $sellweek = 0;
        $sellMonth = 0;
        $sellYear = 0;
        $sellAll = 0;
        foreach ($ordersB as $orderB){
            $vertaNow = \verta( '' , 'iran');
            if ($vertaNow->diffDays(verta($orderB->date , 'iran')) < 1){
                $sellDay += $orderB->price;
            }
            if ($vertaNow->diffDays(verta($orderB->date , 'iran')) < 8){
                $sellweek += $orderB->price;
            }
            if ($vertaNow->diffDays(verta($orderB->date , 'iran')) < 31){
                $sellMonth += $orderB->price;
            }
            if ($vertaNow->diffDays(verta($orderB->date , 'iran')) < 366){
                $sellYear += $orderB->price;
            }
            $sellAll += $orderB->price;
        }

        return view('seller.dashboard' , compact('sellDay' , 'sellMonth' , 'sellweek' , 'sellYear'  , 'massagesSeen', 'sellAll' ,  'varActive' , 'varDeActive' , 'varRemain' , 'varRemainOff', 'varSpecial' , 'varCount' , 'orNow' , 'orSent' , 'orCancel' , 'orCount' , 'proActive' , 'proDeActive'));

    }


    public function seller_products(){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();
        $products = Product::query()->with('Ccategories')->orderBy('id' , 'desc')->get();
        $productCategory = [];
        foreach ($products as $product){
            $product->{'category_id'} = $product->Ccategories[0]->id;
            $product->{'category_name'} = $product->Ccategories[0]->name;
            $product->{'brand_name'} = $product->brand->name;
            array_push($productCategory , $product);
        }
        $ttt = json_encode($productCategory);
        return view('seller.products.index' , compact('products' , 'productCategory' , 'ttt' , 'massagesSeen'));
    }

    public function seller_products_create(){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();
        $brands = Brand::all();
        $groups = Category::all();
        return view('seller.products.create' , compact('brands' , 'groups' , 'massagesSeen'));
    }

    public function seller_products_store(Request $request){
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
            'active'=>0,
            'image'=>$lll,
        ]);
        $category->Ccategories()->sync($request->facke);
        return back();
    }

    public function seller_products_addVar(Product $product){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();
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
        return view('seller.products.variations.create' , compact(['product' ,'colors' , 'sizes' , 'weights' , 'volumes' , 'Warrantys' , 'numbers' , 'variety' , 'massagesSeen']));
    }


    public function seller_products_addVar_store(Request $request){
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
            'special'=>0,
            'Warranty'=>$request->Warranty,
            'moreSell'=>0,
            'brand_id'=>$request->brand,
            'user_id'=>auth()->user()->id,

        ]);

        $category->categories()->sync($request->categories);


        return back();

    }


    public function seller_varieties(){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();
        $variaties = Variety::query()->where('user_id' , auth()->user()->id)->with('categories')->with('warr')->with('products')->orderBy('id' , 'desc')->get();
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
        return view('seller.products.variations.index' , compact('varJson' , 'variaties' , 'massagesSeen'));
    }


    public function seller_varieties_values(Request $request){
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

    public function seller_varieties_active(Request $request){
        Variety::where('id' , $request->variety)->update([
            'active'=> $request->active,
        ]);
    }

    public function seller_orders(){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();
        $varieties = Variety::query()->where('user_id' , auth()->user()->id)->get();
        $orderSeller = [];
        foreach ($varieties as $varietie){
            array_push($orderSeller , $varietie->id);
        }
        $orders = Order::query()->whereIn('variety_id' , $orderSeller)->orderBy('date' , )->get();
        $newOrder = [];

        foreach ($orders as $order){
            $order->{'image'} =  explode(',' , $order->variety[0]->product->image)[0] ;
            $order->{'prodoct_id'} = $order->variety[0]->product->id ;
            $order->{'name'} = $order->variety[0]->product->name ;
            $order->{'warranty_name'} = $order->variety[0]->warranty->name ;
            $order->{'warranty_period'} = $order->variety[0]->warranty->period ;
            $order->{'PDateDay'} = verta($order->date , 'iran')->day ;
            $order->{'PDateMonth'} = verta($order->date , 'iran')->month ;
            $order->{'PDateYear'} = verta($order->date , 'iran')->year ;
            $order->{'nowDay'} = verta('','iran')->day ;
            $order->{'nowMonth'} = verta('','iran')->month ;
            $order->{'nowYear'} = verta('','iran')->year ;
            $order->{'seller_id'} = $order->variety[0]->user_id ;
            $order->{'auth_id'} = auth()->user()->id ;

            if ($order->variety[0]->product->variety_type == 'color'){
                $order->{'var_name'} = $order->variety[0]->color->name;
            }elseif ($order->variety[0]->product->variety_type == 'size'){
                $order->{'var_name'} = $order->variety[0]->size->size;
            }elseif ($order->variety[0]->product->variety_type == 'Weight'){
                $order->{'var_name'} = $order->variety[0]->Weight->weight;
            }elseif ($order->variety[0]->product->variety_type == 'volume'){
                $order->{'var_name'} = $order->variety[0]->volume->volume;
            }elseif ($order->variety[0]->product->variety_type == 'number'){
                $order->{'var_name'} = $order->variety[0]->num->number;
            }elseif ($order->variety[0]->product->variety_type == 'null'){
                $order->{'var_name'} = '';
            }

            $order->{'user_name'} = $order->user[0]->name ;
            $order->{'user_address'} = $order->user[0]->address ;
            $order->{'user_phone'} = $order->user[0]->phone ;
            array_push($newOrder , $order);

        }
        $orderLast = json_encode($newOrder);
        return view('seller.order.order' , compact('orderLast' , 'orders' , 'massagesSeen'));
    }

    public function seller_orders_update(Request $request){
        $varity = Variety::query()->where('id', $request->varietyId)->get();
        Order::where('id' , $request->orderId)->update(['order_status'=>$request->status]);
        if($request->action == 'canceled'){
            Variety::where('id', $request->varietyId)->update([
                'reserve_num'=> $varity[0]->reserve_num - $request->number,
                'remain'=> $varity[0]->remain + $request->number,
            ]);
        }

    }



    public function seller_request_category(Request $request){

        SellerRequest::create([
            'seller_id'=>auth()->user()->id,
            'product_id'=>0,
            'subject'=>'افزودن دسته',
            'name'=>$request->category,
            'about'=>0,
            'file'=>0,
        ]);
        return back();
    }

    public function seller_request_brand(Request $request){

        SellerRequest::create([
            'seller_id'=>auth()->user()->id,
            'product_id'=>0,
            'subject'=>'افزودن برند',
            'name'=>$request->brand,
            'about'=>$request->about,
            'file'=>Storage::put('seller_request/brand' , $request->logo),
        ]);
        return back();
    }


    public function seller_request_warranty(Request $request){

        SellerRequest::create([
            'seller_id'=>auth()->user()->id,
            'product_id'=>0,
            'subject'=>'افزودن گارانتی',
            'name'=>$request->warranty,
            'about'=>0,
            'file'=>Storage::put('seller_request/warranty' , $request->logo),
        ]);
        return back();
    }


    public function seller_request_image(Product $product){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();

        return view('seller.products.edit' , compact('product' , 'massagesSeen'));
    }

    public function seller_request_image_store(Product $product ,Request $request ){
        $request->validate([
            'addPic'=>'required|dimensions:ratio=1/1',
        ]);

        SellerRequest::create([
            'seller_id'=>auth()->user()->id,
            'product_id'=>$product->id,
            'subject'=>'افزودن عکس',
            'name'=>0,
            'about'=>0,
            'file'=>Storage::put('seller_request/addPic' , $request->addPic),
        ]);
        return back();
    }

    public function seller_request_variety(Product $product){
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();
        return view('seller.requests.addVar' , compact('product' , 'massagesSeen'));
    }

    public function seller_request_variety_store(Request $request){
        $request->validate([
            'var'=>'required',
        ]);

        SellerRequest::create([
            'seller_id'=>auth()->user()->id,
            'product_id'=>0,
            'subject'=>$request->type,
            'name'=>$request->var,
            'about'=>0,
            'file'=>0,
        ]);
        return back();
    }



    public function seller_massages(){
        $massages = Massage::query()->where('seller_id' , auth()->user()->id)->orderBy('created_at' , 'desc')->get();
        $massagesSeen = Massage::query()->where('seller_id' , auth()->user()->id)->where('seen' , 0)->get();

        $mass = [] ;
        foreach ($massages as $massage){
            $massage->{'sentDay'} = verta($massage->created_at , 'iran')->day;
            $massage->{'sentMonth'} = verta($massage->created_at , 'iran')->month;
            $massage->{'sentYear'} = verta($massage->created_at , 'iran')->year;
            array_push($mass , $massage);
        }

        $massage = json_encode($mass);

//        dd(count($massagesSeen));
        return view('seller.massages.massages' , compact('massage' , 'massagesSeen'));
    }

    public function seller_massages_seen(Request $request){
        Massage::where('id' , $request->variety)->update(['seen'=>$request->active]);
    }
}
