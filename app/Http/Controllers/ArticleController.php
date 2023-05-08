<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\SellerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function admin_home_articles(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $articles = Article::all();
        $products = Product::query()->where('active' , 1)->get();

        return view('admin.home.articles' , compact('products' , 'articles' , 'countRequest'));
    }


    public function admin_home_articles_create(Request $request){

        $request->validate([
            'subject'=>'required',
            'about1'=>'required',
            'file'=>'required|mimes:jpg|dimensions:ratio=822/522',
            'logo'=>'required|mimes:jpg|dimensions:ratio=610/380',
            'Introduction'=>'required',
            'product'=>'required',
        ]);

        Article::create([
            'subject'=>$request->subject,
            'about1'=>$request->about1,
            'about2'=>$request->about2,
            'about3'=>$request->about3,
            'about4'=>$request->about4,
            'Introduction'=>$request->Introduction,
            'product_id'=>$request->product,
            'file'=>Storage::put('home/article' , $request->file),
            'logo'=>Storage::put('home/article' , $request->logo),
            'special'=>0,

        ]);
        return back();


//        dd($request->product);
    }

    public function admin_home_articles_destroy(Article $article){
        Article::destroy($article->id);
        return back();
    }
}
