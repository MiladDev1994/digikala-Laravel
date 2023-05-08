<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\homeView;
use App\Models\Massage;
use App\Models\Order;
use App\Models\Product;
use App\Models\SellerRequest;
use App\Models\Slider;
use App\Models\User;
use App\Models\Variety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin_dashboard(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $varieties = Variety::all();
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


        $orders = Order::all();
        $orNow = 0 ;
        $orSent = 0 ;
        $orCancel = 0 ;
        foreach ($orders as $order){if ($order->order_status == 'sending'){$orNow += 1;}}
        foreach ($orders as $order){if ($order->order_status == 'sent'){$orSent += 1;}}
        foreach ($orders as $order){if ($order->order_status == 'canceled'){$orCancel += 1;}}
        $orCount = count($orders);


        $products = Product::all();
        $proActive = 0;
        $proDeActive = 0;
        foreach ($products as $product){if ($product->active == 1){$proActive += 1;}}
        foreach ($products as $product){if ($product->active == 0){$proDeActive += 1;}}


        $users = User::all();
        $useActive = 0;
        $useDeActive = 0;
        $useSeller = 0;
        foreach ($users as $user){if ($user->active == 1){$useActive += 1;}}
        foreach ($users as $user){if ($user->active == 0){$useDeActive += 1;}}
        foreach ($users as $user){if ($user->isSeller == 1){$useSeller += 1;}}
//        dd($orSent);


        $ordersB = Order::query()->where('order_status' , 'sent')->get();
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

        return view('admin.dashboard' , compact('sellDay' , 'sellMonth' , 'sellweek' , 'sellYear' , 'sellAll' , 'useActive' , 'useDeActive' , 'useSeller' , 'varActive' , 'varDeActive' , 'varRemain' , 'varRemainOff', 'varSpecial' , 'varCount' , 'orNow' , 'orSent' , 'orCancel' , 'orCount' , 'proActive' , 'proDeActive' , 'countRequest'));

    }


    public function admin_home_banner(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $brands = Brand::all();
        $homeview = homeView::all();
        $categories = Category::all();
        $articles = Article::all();
        return view('admin/home/banner' , compact('brands', 'homeview' , 'categories' , 'articles' , 'countRequest'));
    }


    public function admin_home_banner_headUpdate(Request $request){
        $request->validate([
            'baner'=>'required|dimensions:ratio=28/1|mimes:jpg,jpeg,gif',
            'brand'=>'required',
        ]);

        homeView::where('id' , 9)->update([
            'image'=>Storage::put('home/special-head' , $request->baner),
            'brand_id'=>$request->brand,
        ]);
        return back();
    }


    public function admin_home_banner_specialCategoryUpdate(Request $request){
        $request->validate(['categories'=>'required']);

        homeView::where('id' , 1)->update([
            'image'=>$request->color,
            'category_id'=>$request->categories,
            'brand_id'=>0,
        ]);
        return back();

    }

    public function admin_home_banner_Category4PicUpdate(Request $request){
        $request->validate([
            'image1'=>'mimes:jpg,gif|dimensions:ratio=4/3',
            'image2'=>'mimes:jpg,gif|dimensions:ratio=4/3',
            'image3'=>'mimes:jpg,gif|dimensions:ratio=4/3',
            'image4'=>'mimes:jpg,gif|dimensions:ratio=4/3',
            'category1'=>'required',
            'category2'=>'required',
            'category3'=>'required',
            'category4'=>'required',
        ]);

        if (isset($request->image1)){
            $image1 = Storage::put('home/special-four' ,$request->image1);
            $category1 = $request->category1;
        }else{
            $image1 = homeView::query()->where('id' , 2)->get()[0]->image;
            $category1 = homeView::query()->where('id' , 2)->get()[0]->category_id;
        }

        if (isset($request->image2)){
            $image2 = Storage::put('home/special-four' ,$request->image2);
            $category2 = $request->category2;
        }else{
            $image2 = homeView::query()->where('id' , 3)->get()[0]->image;
            $category2 = homeView::query()->where('id' , 3)->get()[0]->category_id;
        }

        if (isset($request->image3)){
            $image3 = Storage::put('home/special-four' ,$request->image3);
            $category3 = $request->category3;
        }else{
            $image3 = homeView::query()->where('id' , 4)->get()[0]->image;
            $category3 = homeView::query()->where('id' , 4)->get()[0]->category_id;
        }

        if (isset($request->image4)){
            $image4 = Storage::put('home/special-four' ,$request->image4);
            $category4 = $request->category4;
        }else{
            $image4 = homeView::query()->where('id' , 5)->get()[0]->image;
            $category4 = homeView::query()->where('id' , 5)->get()[0]->category_id;
        }


        homeView::where('id' , 2)->update([
            'image'=> $image1,
            'category_id'=>$category1,
        ]);

        homeView::where('id', 3)->update([
            'image' => $image2,
            'category_id' => $category2,
        ]);

        homeView::where('id', 4)->update([
            'image' => $image3,
            'category_id' => $category3,
        ]);

        homeView::where('id', 5)->update([
            'image' => $image4,
            'category_id' => $category4,
        ]);

        return back();


    }

    public function admin_home_banner_Category2PicUpdate(Request $request){
        $request->validate([
            'image5'=>'mimes:jpg,jpeg,gif|dimensions:ratio=5/2',
            'image6'=>'mimes:jpg,jpeg,gif|dimensions:ratio=5/2',
            'category5'=>'required',
            'category6'=>'required',
        ]);


        if (isset($request->image5)){
            $image5 = Storage::put('home/special-two' ,$request->image5);
            $category5 = $request->category5;
        }else{
            $image5 = homeView::query()->where('id' , 6)->get()[0]->image;
            $category5 = homeView::query()->where('id' , 6)->get()[0]->category_id;
        }

        if (isset($request->image6)){
            $image6 = Storage::put('home/special-two' ,$request->image6);
            $category6 = $request->category6;
        }else{
            $image6 = homeView::query()->where('id' , 7)->get()[0]->image;
            $category6 = homeView::query()->where('id' , 7)->get()[0]->category_id;
        }


        homeView::where('id' , 6)->update([
            'image'=> $image5,
            'category_id'=>$category5,
        ]);

        homeView::where('id' , 7)->update([
            'image'=> $image6,
            'category_id'=>$category6,
        ]);

        return back();
    }


    public  function admin_home_banner_Category1PicUpdate(Request $request){
        $request->validate([
            'image7'=>'mimes:jpg,jpeg,gif|dimensions:ratio=8/1',
            'brand7'=>'required',
        ]);


        if (isset($request->image7)){
            $image7 = Storage::put('home/special-one' ,$request->image7);
            $brand7 = $request->brand7;
        }else{
            $image7 = homeView::query()->where('id' , 8)->get()[0]->image;
            $brand7 = homeView::query()->where('id' , 8)->get()[0]->brand_id;
        }


        homeView::where('id' , 8)->update([
            'image'=> $image7,
            'brand_id'=>$brand7,
        ]);

        return back();
    }


    public function admin_home_banner_articleUpdate(Request $request){
        $articles = Article::all();
        $articleCount = count($articles);

        for ($v = 1; $v <= $articleCount; $v++){
            $art = "article".$v;
            if (isset($request->$art) ){
                Article::where('id' , $v)->update(['special'=> 1]);
            }else{
                Article::where('id' , $v)->update(['special'=> 0]);
            }
        }
        return back();


    }



    public function admin_users(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $getUsers = User::all();

        $users = json_encode($getUsers);

        return view('admin.users.users' , compact('users' , 'countRequest'));
    }

    public function admin_users_roleUpdate(Request $request){
        User::where('id' , $request->userId)->update(['role'=>$request->roleValue]);
    }

    public function admin_users_sellerUpdate(Request $request){
        User::where('id' , $request->userId)->update(['isSeller'=>$request->sellerIs]);
    }


    public function admin_comments(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $getCom = Comment::query()->orderBy('active')->get();
        $comments = json_encode($getCom);
        return view('admin.comments.index' , compact('comments' , 'countRequest'));
    }

    public function admin_comments_active(Request $request){

        Comment::where('id' , $request->commentId)->update(['active'=>$request->Act]);
    }

    public function admin_comments_update(Request $request){
        Comment::where('id' , $request->commentId)->update([
            'titr'=>$request->titleVal,
            'text'=>$request->textVal,
        ]);
    }

    public function admin_comments_destroy(Request $request){
        Comment::destroy($request->commentId);
    }









    public function admin_requests(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $requests = SellerRequest::query()->orderBy('id' , 'desc')->get();

        return view('admin.requests.requests' , compact('requests' , 'countRequest'));
    }

    public function admin_requests_destroy(SellerRequest $sellerRequest){
        SellerRequest::destroy($sellerRequest->id);
        return back();
    }



    public function admin_massage(Request $request){
        $request->validate([
            'seller'=>'required',
        ]);

        Massage::create([
            'seller_id'=>$request->seller,
            'about'=>$request->text,
            'seen'=>0
        ]);
//        dd($request);
        return back();
    }
}
