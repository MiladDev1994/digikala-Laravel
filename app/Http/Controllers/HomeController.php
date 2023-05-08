<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\homeView;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use App\Models\Variety;
use Carbon\Carbon;
use Hekmatinasser\Jalali\Jalali;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
        $basketItem = session()->get('basket') ?? [];
        $variation2 = Variety::query()->orderByRaw('rand()')->where('moreSell' , '1')->get();

        $countMoreSell = count($variation2);
        if ($countMoreSell >= 21){
            $MoreSell = 21;
        }else{
            if($countMoreSell % 3 === 0){
                $MoreSell = $countMoreSell;
            }else{
                $MoreSell = floor($countMoreSell / 3)*3 ;
            }
        }
        $sliders = Slider::with('category')->get();
        $categories = Category::query()->where('level' , 1)->get();
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categoriesHomeView = Category::all();
        $homeView1 = homeView::all();

        $categoreTest = Category::query()->where('id' , $homeView1[0]->category_id)->get();

        $testy = [];

        foreach ($categoreTest[0]->products as $item){
            array_push($testy , $item->dkp);

        }
        $varietyTest = Variety::query()->whereIn('dkp' , $testy)->where('special' , 1)->where('active' , 1)->orderByRaw('rand()')->get();
//        dd($varietyTest);


        $ppp = Product::query()->where('active' , 1)->get();
        $pppActiv = [];
        foreach ($ppp as $item){
            array_push($pppActiv , $item->dkp);
        }
        $variation = Variety::query()->orderByRaw('rand()')->whereIn('dkp' , $pppActiv)->where('special' , '1')->where('remain' , '>' ,'0')->where('active' , '1')->limit(15)->get();
        $variation1 = Variety::query()->orderByRaw('rand()')->whereIn('dkp' , $pppActiv)->where('moreSell' , '1')->where('remain' , '>' ,'0')->where('active' , '1')->limit($MoreSell)->get();
        $brands = Brand::query()->where('special' , '1')->get();
        $articles = Article::query()->where('special' , '1')->with('product')->orderByRaw('rand()')->get();
        return view('home' , compact(['categories' , 'basketItem' , 'categoriesId' , 'varietyTest' , 'sliders' , 'variation' , 'homeView1' , 'categoriesHomeView' , 'brands' , 'variation1' , 'articles']));
    }







////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function product_category_index(Category $category , Request $request , Brand $brand){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();

        $var = DB::table('categoryables')
            ->where('categoryable_type' , Variety::class)
            ->where('category_id' , $category->id)
            ->get();


        $varId = [];
        foreach ($var as $ttt){

            array_push($varId , $ttt->categoryable_id);
        }

        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->whereIn('id' , $varId )->orderByRaw('rand()')->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->whereIn('id' , $varId )->orderByRaw('rand()')->orderBy('moresell' , 'desc')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->whereIn('id' , $varId )->orderBy('id' , 'desc')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->orderBy('price_off')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->orderBy('price_off' , 'desc')->with('product')->paginate(12);
        }else{
            $varieties = Variety::query()->whereIn('id' , $varId )->orderByRaw('rand()')->with('product')->paginate(12);
        }

        return view('products.index' , compact('varieties' , 'categoriesHomeView' , 'basketItem' , 'categoriesId' , 'categories'  , 'brands' , 'request' , 'brand' , 'homeView1' , 'category'));


//        dd($request->query('range'));
    }


    public function product_category_brand_index(Category $category , Brand $brand , Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();

        $var = DB::table('categoryables')
            ->where('categoryable_type' , Variety::class)
            ->where('category_id' , $category->id)
            ->get();


        $varId = [];
        foreach ($var as $ttt){

            array_push($varId , $ttt->categoryable_id);
        }

        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->with('product')->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->orderBy('moresell' , 'desc')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderByRaw('rand()')->paginate(12);
        }

        return view('products.index' , compact('brand' , 'categoriesId' , 'basketItem'  , 'categoriesHomeView', 'categories' ,  'brands' , 'brand' , 'category' , 'request' , 'varieties' , 'homeView1'));
    }


    public function product_brands_index(Brand $brand , Category $category , Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();

        $categoryList = Category::query()->orderBy('level')->get();

        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->where('brand_id' , $brand->id)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->with('product')->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->where('brand_id' , $brand->id)->with('product')->orderBy('moresell' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->where('brand_id' , $brand->id)->with('product')->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->where('brand_id' , $brand->id)->with('product')->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->where('brand_id' , $brand->id)->with('product')->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->where('brand_id' , $brand->id)->with('product')->orderByRaw('rand()')->paginate(12);
        }

        return view('products.index' , compact('categoriesId' , 'categories' , 'basketItem', 'brands'  , 'categoriesHomeView', 'brand' , 'varieties' , 'homeView1' , 'categoryList' , 'category' ));
    }


    public function product_brands_category_index(Brand $brand , Category $category , Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();

        $var = DB::table('categoryables')
            ->where('categoryable_type' , Variety::class)
            ->where('category_id' , $category->id)
            ->get();


        $varId = [];
        foreach ($var as $ttt){

            array_push($varId , $ttt->categoryable_id);
        }


        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->with('product')->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('moresell' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderByRaw('rand()')->paginate(12);
        }


        return view('products.index' , compact('brand' , 'categoriesId' , 'basketItem' , 'categoriesHomeView' , 'categories' ,  'brands' , 'brand' , 'category' , 'varieties' , 'homeView1' , 'categoryList'));
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function product_moreSell_index(Brand $brand , Category $category , Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $brands = Brand::all();
        $homeView1 = homeView::all();
        $categoriesHomeView = Category::all();

        $categoryList = Category::query()->orderBy('level')->get();


        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->orderByRaw('rand()')->paginate(12);
        }

        return view('products.index' , compact('categoriesId' , 'categories' , 'basketItem' , 'categoriesHomeView', 'brands', 'brand' , 'varieties' , 'homeView1' , 'categoryList' , 'category' ));
    }


    public function product_moreSell_category_index(Category $category, Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();

        $var = DB::table('categoryables')
            ->where('categoryable_type' , Variety::class)
            ->where('category_id' , $category->id)
            ->get();


        $varId = [];
        foreach ($var as $ttt){

            array_push($varId , $ttt->categoryable_id);
        }






        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->orderByRaw('rand()')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->orderBy('id' , 'desc')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->orderBy('price_off')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->orderBy('price_off' , 'desc')->with('product')->paginate(12);
        }else{
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->orderByRaw('rand()')->with('product')->paginate(12);
        }

        return view('products.index' , compact('varieties' , 'categoriesId' , 'basketItem'  , 'categoriesHomeView', 'categories'  , 'brands' , 'homeView1' , 'category' , 'categoryList'));
    }


    public function product_moreSell_brand_index(Brand $brand , Category $category , Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $brands = Brand::all();
        $homeView1 = homeView::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();


        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->where('brand_id' , $brand->id)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->where('brand_id' , $brand->id)->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->where('brand_id' , $brand->id)->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->where('brand_id' , $brand->id)->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->with('product')->where('moreSell' , 1)->where('brand_id' , $brand->id)->orderByRaw('rand()')->paginate(12);
        }

        return view('products.index' , compact('categoriesId' , 'categories' , 'basketItem' , 'categoriesHomeView', 'brands', 'brand' , 'varieties' , 'homeView1' , 'categoryList' , 'category'));
    }


    public function product_moreSell_categorybrand_index(Category $category , Brand $brand, Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();

        $var = DB::table('categoryables')
            ->where('categoryable_type' , Variety::class)
            ->where('category_id' , $category->id)
            ->get();


        $varId = [];
        foreach ($var as $ttt){

            array_push($varId , $ttt->categoryable_id);
        }




        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->where('brand_id'  ,$brand->id)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->orderByRaw('rand()')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->where('brand_id'  ,$brand->id)->orderBy('id' , 'desc')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->where('brand_id'  ,$brand->id)->orderBy('price_off')->with('product')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->where('brand_id'  ,$brand->id)->orderBy('price_off' , 'desc')->with('product')->paginate(12);
        }else{
            $varieties = Variety::query()->whereIn('id' , $varId )->where('moresell'  ,1)->where('brand_id'  ,$brand->id)->orderByRaw('rand()')->with('product')->paginate(12);
        }

        return view('products.index' , compact('varieties' , 'categoriesId' , 'basketItem' , 'categoriesHomeView' , 'categories'  , 'brands' , 'homeView1' , 'category' , 'categoryList' , 'brand'));
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function product_special_index(Category $category, Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();


        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->with('product')->where('special' , 1)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->orderByRaw('rand()')->where('active' , 1)->where('remain' , '>' , 0)->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->orderBy('moresell')->where('active' , 1)->where('remain' , '>' , 0)->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->orderBy('id' , 'desc')->where('active' , 1)->where('remain' , '>' , 0)->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->orderBy('price_off')->where('active' , 1)->where('remain' , '>' , 0)->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->orderBy('price_off' , 'desc')->where('active' , 1)->where('remain' , '>' , 0)->paginate(12);
        }else{
            $varieties = Variety::query()->with('product')->where('special' , 1)->orderByRaw('rand()')->where('active' , 1)->where('remain' , '>' , 0)->paginate(12);
        }

        return view('products.index' , compact('categoriesId' , 'categories' , 'basketItem' , 'categoriesHomeView' , 'varieties' , 'brands' , 'homeView1' , 'categoryList' , 'category'));
    }


    public function product_special_category_index(Category $category, Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();


        $var = DB::table('categoryables')
            ->where('categoryable_type' , Variety::class)
            ->where('category_id' , $category->id)
            ->get();


        $varId = [];
        foreach ($var as $ttt){

            array_push($varId , $ttt->categoryable_id);
        }


        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->whereIn('id' , $varId )->where('special' , 1)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->with('product')->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('special' , 1)->with('product')->orderBy('moresell')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('special' , 1)->with('product')->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('special' , 1)->with('product')->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('special' , 1)->with('product')->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->whereIn('id' , $varId )->where('special' , 1)->with('product')->orderByRaw('rand()')->paginate(12);
        }

        return view('products.index' , compact('categoriesId' , 'categories' , 'basketItem'  , 'categoriesHomeView',  'brands'  , 'category' , 'varieties' , 'homeView1' , 'categoryList'));
    }


    public function product_special_brand_index(Brand $brand, Category $category , Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();


        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->with('product')->where('special' , 1)->where('brand_id' , $brand->id)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->where('brand_id' , $brand->id)->orderBy('moresell')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->where('brand_id' , $brand->id)->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->where('brand_id' , $brand->id)->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->with('product')->where('special' , 1)->where('brand_id' , $brand->id)->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->with('product')->where('special' , 1)->where('brand_id' , $brand->id)->orderByRaw('rand()')->paginate(12);
        }

        return view('products.index' , compact('categoriesId' , 'categories' , 'basketItem' , 'categoriesHomeView' , 'varieties' , 'brands' , 'brand' , 'homeView1' , 'categoryList' , 'category'));
    }


    public function product_special_categorybrand_index(Category $category , Brand $brand , Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();

        $var = DB::table('categoryables')
            ->where('categoryable_type' , Variety::class)
            ->where('category_id' , $category->id)
            ->get();


        $varId = [];
        foreach ($var as $ttt){

            array_push($varId , $ttt->categoryable_id);
        }


        if ($request->query('range')){
            $range = explode('-' , $request->query('range'));
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->whereBetween('price_off' , [$range[0]*10 , $range[1]*10])->with('product')->orderByRaw('rand()')->paginate(12);
        }elseif ($request->query('sort') == 'moreesells'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('moresell')->paginate(12);
        }elseif ($request->query('sort') == 'newAdded'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('id' , 'desc')->paginate(12);
        }elseif ($request->query('sort') == 'inexpensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('price_off')->paginate(12);
        }elseif ($request->query('sort') == 'expensive'){
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderBy('price_off' , 'desc')->paginate(12);
        }else{
            $varieties = Variety::query()->whereIn('id' , $varId )->where('brand_id' , $brand->id)->with('product')->orderByRaw('rand()')->paginate(12);
        }

        return view('products.index' , compact('brand' , 'categoriesId' , 'basketItem' , 'categoriesHomeView' , 'categories' ,  'brands' , 'brand' , 'category' , 'varieties' , 'homeView1' , 'categoryList'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function article_index(Article $article){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();
        $articles = Article::query()->with('product')->where('id' , $article->id)->get();
        $articlesAll = Article::all();
//        $varietyArticle = Variety::query()->where('id' , $articles[0]->product_id)->get();
        $productArticle = Product::query()->where('id' , $articles[0]->product_id)->get();

        return view('articles.index' , compact( 'categoriesId' , 'articlesAll' , 'basketItem' , 'productArticle' , 'articles' , 'categoriesHomeView' , 'categories' ,  'brands' ,  'homeView1' , 'categoryList'));

    }

    public function productView(Product $product , Variety $variety){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();

        $products = Product::query()->where('id' , $product->id)->get();
        $varieties = Variety::query()->where('dkp' , $product->dkp)->where('remain' , '>' , '0')->where('active' , '1')->where('access' , '1')->orderBy('price_off')->get();
        $Bvarieties = Variety::query()->where('dkp' , $product->dkp)->orderBy('price_off')->get();
        $comments = Comment::query()->where('product_id' , $product->id)->where('active' , 1)->get();

        $idVariety = [];
        foreach ($Bvarieties as $item){
            array_push($idVariety , $item->id);
        }

        $orders = Order::query()->whereIn('variety_id' , $idVariety)->where('order_status' , 'sent')->get();
        $idOrders = [];
        foreach ($orders as $item){
            array_push($idOrders , $item->buyer_id);
        }


        if (auth()->check()){
            $favorite = Favorite::query()->where('user_id' , auth()->user()->id)->where('product_id' , $product->id)->get();
        }else{
            $favorite = [];
        }


        $category = Category::query()->where('id' , $products[0]->Ccategories[0]->id)->with('varieties')->get();

        $allVar = [];

        foreach ($category[0]->varieties as $item){
            array_push($allVar , $item->id);
        }
        $varSimilar = Variety::query()->whereIn('id' , $allVar)->where('remain' , '>' , 1)->with('products')->orderByRaw('rand()')->get();

//        dd($favorite);

        return view('products.view.index' , compact('varieties' , 'idOrders' , 'basketItem' , 'favorite' , 'comments' , 'varSimilar' , 'Bvarieties' , 'categoriesHomeView' , 'products' , 'categoriesId' , 'categories' , 'homeView1' , 'brands' , 'categoryList'));
    }








    public function basket_store(Request $request){

        $basketItem = session()->get('basket') ?? [];

        $exist = false;
        foreach ($basketItem as $key=>$item){

            if ($request->id == $item['id']){
                $basketItem[$key]['number'] += 1;
                $exist = true;
            }
        }
        if (!$exist){
            array_push($basketItem , [
                'id'=>$request->id,
                'price'=>$request->price,
                'number'=>$request->number,
            ]);
        }
        session()->put('basket' , $basketItem);

        return back();
    }





    public  function basket_destroy(Request $request){
        $basketItem = session()->get('basket') ?? [];

        foreach ($basketItem as $key=>$item){

            if ($request->id == $item['id']){
                if ($item['number'] > 1){
                    $basketItem[$key]['number'] -= 1;
                }else{
                    unset($basketItem[$key]);
                }

            }
        }

        session()->put('basket' , $basketItem);

        return back();

    }


    public function basket_index(){
        $basketItem = session()->get('basket') ?? [];

        $basketId = [];
        foreach ($basketItem as $item){
            array_push($basketId , $item['id']);

        }
        $varietyBasket = Variety::query()->whereIn('id' , $basketId)->get();
//        dd($varietyBasket);



        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();
        return view('products.basket.index' , compact('basketItem' , 'varietyBasket' , 'categoriesId' , 'categories', 'homeView1', 'brands', 'categoryList', 'categoriesHomeView'));
    }

    public function basket_destroyAll(){
        session()->forget('basket');
        return back();
    }






    public function basket_shipping(){
        $basketItem = session()->get('basket') ?? [];

        $basketId = [];
        foreach ($basketItem as $item){
            array_push($basketId , $item['id']);

        }
        $varietyBasket = Variety::query()->whereIn('id' , $basketId)->get();
        $shippingTime = [];
        foreach ($varietyBasket as $shiping){
            array_push($shippingTime , $shiping->shipping_time);

        }
        $shippingTimeMax = max($shippingTime);

        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();
        return view('products.basket.ship' , compact('basketItem' , 'shippingTimeMax'  , 'varietyBasket' , 'categoriesId' , 'categories', 'homeView1', 'brands', 'categoryList', 'categoriesHomeView'));
    }












    public function basket_complete(Request $request){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoryList = Category::all();
        $categoriesHomeView = Category::all();

        $basketId = [];
        foreach ($basketItem as $item){
            array_push($basketId , $item['id']);
        }
        $varietyBasket = Variety::query()->whereIn('id' , $basketId)->get();


        $request->validate([
            'time'=>'required',
            'date'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'pay'=>'required',
        ]);

        $countOrder = count(Order::all());
        foreach ($varietyBasket as $variety){
            foreach ($basketItem as $item){
                if ($variety->id == $item['id']){
                    Order::create([
                        'order_val'=>$countOrder+10,
                        'buyer_id'=>auth()->user()->id,
                        'variety_id'=>$item['id'],
                        'number'=>$item['number'],
                        'price'=>$variety->price_off,
                        'pay_status'=>$request->pay,
                        'date'=>$request->date,
                        'time'=>$request->time,
                        'address'=>$request->address,
                        'phone'=>$request->phone,
                        'order_status'=>'sending',
                    ]);


                    Variety::where('id' , $variety->id)->update([
                        'reserve_num'=>$variety->reserve_num + $item['number'],
                        'remain'=>$variety->remain - $item['number'],
                    ]);

                    User::where('id' , auth()->user()->id)->update([
                        'address'=>$request->address,
                        'phone'=>$request->phone,
                    ]);

                }
            }
        }
        $shippingTimeMax = 0;

        $modal = 1;
        session()->forget('basket');
        return view('products/basket/ship', compact('modal' , 'shippingTimeMax' , 'basketItem' , 'shippingTimeMax'  , 'varietyBasket' , 'categoriesId' , 'categories', 'homeView1', 'brands', 'categoryList', 'categoriesHomeView'));
//        return redirect('/');
    }




    public function user_panel_order(){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();
        $orders = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sending')->with('variety')->orderBy('created_at' , 'desc')->get();
        $orders_sent = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sent')->with('variety')->orderBy('created_at' , 'desc')->get();
        $orders_canceled = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'canceled')->with('variety')->orderBy('created_at' , 'desc')->get();

        return view('user.orderNow' , compact('basketItem' ,'orders_sent','orders_canceled', 'orders' , 'categoriesId' , 'categories' , 'homeView1' , 'brands' , 'categoriesHomeView')) ;
    }

    public function user_panel_order_sent(){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();
        $orders = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sending')->with('variety')->orderBy('created_at' , 'desc')->get();
        $orders_sent = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sent')->with('variety')->orderBy('created_at' , 'desc')->get();
        $orders_canceled = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'canceled')->with('variety')->orderBy('created_at' , 'desc')->get();

        return view('user.sent' , compact('basketItem' , 'orders_sent' , 'orders' , 'orders_canceled' , 'categoriesId' , 'categories' , 'homeView1' , 'brands' , 'categoriesHomeView')) ;
    }





    public function user_panel_order_canceled(){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();
        $orders = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sending')->with('variety')->orderBy('created_at' , 'desc')->get();
        $orders_sent = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sent')->with('variety')->orderBy('created_at' , 'desc')->get();
        $orders_canceled = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'canceled')->with('variety')->orderBy('created_at' , 'desc')->get();

        return view('user.canceled' , compact('basketItem' , 'orders' , 'orders_sent' , 'orders_canceled' , 'categoriesId' , 'categories' , 'homeView1' , 'brands' , 'categoriesHomeView')) ;
    }






    public function user_panel_favorite(){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();

        $favorite = Favorite::query()->where('user_id' , auth()->user()->id)->with('products')->get();
        $favorite_id = [];
        foreach ($favorite as $item){
            array_push($favorite_id , $item->products[0]->variation[0]->id);
        }

        $varietiesFavorite = Variety::query()->whereIn('id' , $favorite_id)->get();
        $orders = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sending')->with('variety')->get();
        $orders_sent = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sent')->with('variety')->get();
        $orders_canceled = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'canceled')->with('variety')->get();


        return view('user.favorite' , compact('basketItem' , 'orders' , 'orders_sent' , 'orders_canceled', 'varietiesFavorite' , 'categoriesId' , 'categories' , 'homeView1' , 'brands' , 'categoriesHomeView')) ;
    }



    public function user_panel_order_cancel(Order $order){
//        $oreders = Order::query()->where('id' , $order->id)->get();
        $variety = Variety::query()->where('id' , $order->variety_id)->get();
        Order::where('id' , $order->id)->update(['order_status'=>'canceled']);

        Variety::where('id' , $order->variety_id)->update([
            'reserve_num'=>$variety[0]->reserve_num - $order->number,
            'remain'=>$variety[0]->remain + $order->number,
        ]);
        return back();
    }



    public function user_panel_comments(){
        $basketItem = session()->get('basket') ?? [];
        $categoriesId = Category::query()->where('id' , 1)->get();
        $categories = Category::query()->where('level' , 1)->get();
        $homeView1 = homeView::all();
        $brands = Brand::all();
        $categoriesHomeView = Category::all();
        $orders = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sending')->with('variety')->get();
        $orders_sent = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'sent')->with('variety')->get();
        $orders_canceled = Order::query()->where('buyer_id' , auth()->user()->id)->where('order_status' , 'canceled')->with('variety')->get();

        $comments = Comment::query()->where('user_id' , auth()->user()->id)->where('active' , 1)->with('product')->get();
//        dd($comments);
//        dd($comments);
        return view('user.comment' , compact('basketItem' , 'comments' , 'orders' , 'orders_sent' , 'orders_canceled' , 'categoriesId' , 'categories' , 'homeView1' , 'brands' , 'categoriesHomeView')) ;
    }





}


