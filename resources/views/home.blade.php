@extends('layouts.app')

@vite(['resources/css/home.css'])

@section('main')


<div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @php $num = count($sliders); @endphp
        @foreach($sliders as $slider)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$num-=1}}" class="{{$slider->id == 1 ? 'active' : ''}} bg-dark rounded rounded-circle " style="width: 10px;height: 10px " aria-current="true{{$slider->id == 1 ? 'true' : ''}}"  aria-label="Slide {{$slider->id}}"></button>
        @endforeach
    </div>
    <div class="carousel-inner kala-slider-image-box" >
        @foreach($sliders as $slider)
            <div style="height:100%" href="{{$slider->id}}" class="carousel-item  {{$slider->id == 1 ? 'active' : ''}}">
                <a href="{{route('product.category.index' , $slider->group_id)}}" style="background-size: cover" class=" d-block h-100 position-relative overflow-hidden d-flex align-items-center justify-content-center">
                    <img  src="{{url('images/'.$slider->image)}}" class="d-block  position-absolute kala-slider-image" alt="...">
                </a>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="width: 100px">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="width: 100px">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>




<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12 bg-transparent">
            <div class="row d-flex align-items-center justify-content-around">
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <img class="mb-2" width="55px" src="{{url('images/home/other/d0dc31c892be8cf1408e4e14580b3f479da66bd1_1648897133.png')}}" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> دیجی‌کالا جت </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <img class="mb-2" width="55px" src="{{url('images/home/other/625d8883f37944f3f0c4af5fe39435600931ab22_1664309850.png')}}" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> حراج استایل </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <img class="mb-2" width="55px" src="{{url('images/home/other/ac127167132653d14c758748b07824a6a7643a31_1663444619.png')}}" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> خرید اقساطی </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <img class="mb-2" width="55px" src="{{url('images/home/other/6c69096a524add2d4646cd162dfa5f66d4ddceac_1668952039.png')}}" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> خرید عمده </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 bg-transparent">
            <div class="row d-flex align-items-center justify-content-around d-flex align-items-center justify-content-center">
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <img class="mb-2" width="55px" src="{{url('images/home/other/f18a182f7c300af9ce3eb8f47201ef340fc87eb3_1670930133.png')}}" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> چرخ و بخت </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <img class="mb-2" width="55px" src="{{url('images/home/other/78ccd40cbf305fb067de78ddab5be84f69589c8d_1648897009.png')}}" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> دیجی پلاس </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <img class="mb-2" width="55px" src="{{url('images/home/other/967cbaa25713ca4d0e58cb5aaf0e486ab986d460_1648898393.png')}}" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> ماموریت ها </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-l-1 col-sm-2 col-2 d-flex align-items-center justify-content-center flex-column" style="height: 130px ; font-size: 13px">
                    <i  class="mb-2 bi-three-dots bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light" style="width: 55px ; height: 55px ; font-size: 25px"></i>
                    <div class="d-flex align-items-center justify-content-center" style="white-space: nowrap"> بیشتر </div>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="w-100 mt-3 d-flex align-items-center justify-content-center" style="height: 280px">
    <div class="kala-super-dragable bg-danger">
        <div class="kala-super-dragable-right">
            @php
                echo file_get_contents('images/amazing-typo.svg');
            @endphp
            <img src="{{url('images/box.png')}}">
            <a href="{{route('product.special.index')}}" class="text-light" style="text-decoration: none"> <b> مشاهده همه <i class="bi-chevron-left"></i> </b> </a>
        </div>
        <div class="kala-super-dragable-left">
            <i class="bi-chevron-right icon-right shadow"></i>
            <div class="kala-super-dragable-left-main" >
                @php
                    $marginRight = -182;
                    $child = 0;
                    $Sproducts = 0;
                @endphp
                @foreach($variation as $variety)
                    @php
                        $images = explode(',' ,$variety->product->image);
                        $Sproducts += 1;
                    @endphp
                    <a target="_blank" class="Sproducts{{$Sproducts}} overflow-hidden bg-white me-1" style="right: {{$marginRight+=182}}px ; text-decoration: none ; border-radius:  {{$Sproducts == 1 ? '0 10px 10px 0' : '' }} {{$Sproducts == 15 ? '10px 0 0 10px' : '' }}">
                        <div class="bg-white d-flex align-items-start justify-content-center" style="width: 100% ; height: 180px">
                            <div class="bg-white" style="width: 90% ; height: 90% ; background-image: url('images/{{$images[0]}}'); background-size: cover ; background-position: center"></div>
                        </div>
                        <div class="bg-white px-2 text-end" style="width: 100% ; height: 60px ">

                            <div class="w-100 d-flex align-items-center  {{$variety->price_off != $variety->price ? 'justify-content-around' : 'justify-content-end'}}">
                                @if($variety->price_off != $variety->price)
                                <b style="font-size: 13px" class="text-white bg-danger px-2 rounded-pill">{{(round(1-($variety->price_off/$variety->price) , 2)*100).'%'  }}</b>
                                @endif
                                <div class="">
                                    <b class="text-dark" style="font-size: 15px">{{number_format($variety->price_off/10) }}</b>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </div>
                            </div>
                            <div class="w-100 d-flex align-items-center {{$variety->price_off != $variety->price ? 'justify-content-around' : 'justify-content-start px-2'}} text-dark" style="font-size: 12 ; height: 40px">
                                @if($variety->product->variety_type == 'color')
                                    <div class="shadow" style="width: 10px ; height: 10px ; border-radius: 50% ; background-color: {{$variety->color->color}}"></div>
                                @endif
                                    @if($variety->product->variety_type == 'size')
                                        <div class=" px-2 rounded-pill" style="background-color: #f4e8e8">
                                            {{$variety->size->size}}
                                        </div>
                                    @endif
                                    @if($variety->price_off != $variety->price)
                                        <p class="text-secondary mt-2 text-center" style="font-size: 13px ; text-decoration: line-through ; text-decoration-color: #b0b0b0">{{number_format($variety->price/10) }}</p>
                                    @endif
                            </div>

                        </div>
                    </a>

                    <script>
                        if(window.navigator.userAgent.indexOf("Chrome") > 0){
                            let Sproducts{{$Sproducts}} = document.querySelector('.Sproducts{{$Sproducts}}');
                            Sproducts{{$Sproducts}}.addEventListener('mousedown' , function (e){
                                Sproducts{{$Sproducts}}.setAttribute('href' , '{{route('productView' , $variety->products->id)}}')
                            })

                            Sproducts{{$Sproducts}}.addEventListener('mousemove' , function (e){
                                setTimeout(function (){
                                    Sproducts{{$Sproducts}}.removeAttribute('href')
                                },500)
                            })
                        }else {
                            let Sproducts{{$Sproducts}} = document.querySelector('.Sproducts{{$Sproducts}}');
                            Sproducts{{$Sproducts}}.addEventListener('mousedown' , function (e){
                                Sproducts{{$Sproducts}}.setAttribute('href' , '{{route('productView' , $variety->products->id)}}')
                            })

                            Sproducts{{$Sproducts}}.addEventListener('mousemove' , function (e){
                                    Sproducts{{$Sproducts}}.removeAttribute('href')
                            })
                        }
                    </script>
                @endforeach
            </div>
            <i class="bi-chevron-left icon-left shadow"></i>
        </div>
    </div>
</div>



{{--specialNarrow--}}
<div class="w-100 mt-3 ">
    <div class="kala-superCategories position-relative m-auto" style="background-color: {{$homeView1[0]->image}};">
        @for($v = 0; $v < 500; $v++)
            <div class="position-absolute" style="right: {{rand(0,1800)}}px ; top:{{rand(0,400)}}px ; width: 20px ; height: 20px ; z-index: 0 ; border-radius: 50% ; background-color: #fb0909 ; filter: blur(20px)">
            </div>
        @endfor
        <div class="kala-superCategories-right d-flex align-items-center justify-content-around">
            <img src="{{url('images/home/other/fresh.png')}}">
            <div class="h4 h-sm-2 text-success d-flex align-items-center justify-content-center flex-column">
                @foreach($homeView1 as $item)
                    @if($item->id==1)
                     <h4>{{'شگفت انگیز'}}</h4>
                     <h3>{{$item->category->name}}</h3>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="kala-superCategories-left position-relative">
            @foreach($varietyTest as $item)
                @php
                    $imaheMain = explode(',' , $item->product->image)
                @endphp
                <a target="_blank" href="{{route('productView' , $item->products->id)}}" style="width: 85px ; height: 85px ; margin-right: 10px ; float: right" class="position-relative mt-2 rounded-circle bg-white d-flex align-items-center justify-content-center">
                    <img width="70%" src="{{url('images/'.$imaheMain[0])}}" title="{{$item->id}}">
                    <div class="position-absolute px-1 bg-danger rounded-pill text-white" style="text-decoration: none ; right: 0 ; bottom: 0">
                        @if($item->price_off != $item->price)
                            {{((1-(round($item->price_off / $item->price ,2)))*100) . '%' }}
                        @endif
                    </div>
                </a>
            @endforeach
            <div class="position-absolute d-flex align-items-center justify-content-center px-2" style="height: 100% ; left: 0 ">
                <a href="{{route('product.special.category.index' , $homeView1[0]->category_id) }}" style=" height: 50px ; left: 10px; float: left ; text-decoration: none ; white-space: nowrap ; font-weight: 700" class="text-white px-3 shadow-sm  bg-danger rounded-pill d-flex align-items-center justify-content-center">
                    {{'بیش از'}} {{count($varietyTest)}} {{'کالا'}}
                    <i class="ms-2 bi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>





{{--    category 4Pic--}}

<div class="w-100 mt-2">
    <div class="kala-category-fourItem-box m-auto">
        @foreach($homeView1 as $item)
            @if($item->id > 1 && $item->id < 6)
                <a href="{{route('product.category.index' , $item->category_id) }}" class="kala-category-fourItem d-flex align-items-center justify-content-center p-3">
                    <img width="100%" src="{{url('images/'.$item->image)}}">
                </a>
            @endif
        @endforeach
    </div>
</div>



<h4 class="mt-5 text-center"><b style="font-size: 22px"> دسته‌بندی‌های دیجی‌کالا </b>  </h4>
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            @foreach($categories as $category)
                <a href="{{route('product.category.index' , $category->id)}}" style="text-decoration: none" class="text-center text-dark col-6 col-sm-4 col-lg-2 d-flex align-items-center justify-content-center flex-column p-3">
                    <img width="80%" src="{{url('images/'.$category->image)}}">
                    <b>{{$category->name}}</b>
                </a>
            @endforeach
        </div>
    </div>
</div>




<div class="w-100 mt-2">
    <div class="kala-category-twoItem-box m-auto d-flex align-items-center justify-content-center">
        @foreach($homeView1 as $item)
            @if($item->id > 5 && $item->id < 8)
                <a href="{{route('product.category.index' , $item->category_id)}}" class="kala-category-twoItem d-flex align-items-center justify-content-center p-2">
                    <img width="100%" src="{{url('images/'.$item->image)}}">
                </a>
            @endif
        @endforeach
    </div>
</div>






<h3 class="text-center mt-5">    پیشنهاد دیجی کالا </h3>

<div class="w-100 d-flex align-items-center justify-content-center">
    <div class="d-inline-block position-relative m-auto mt-4 kala-specialCategory-main">
        <i class="kala-SCategory-btnLeft bi-chevron-left position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
        <div class="kala-specialCategory position-relative overflow-hidden m-auto">
            @php
                $absolot = -200;
                $SCategoryPlus = 0;
            @endphp
            @foreach($categoriesHomeView as $category)
                @if($category->special == 1)
                    @php
                        $SCategoryPlus += 1;
                    @endphp
                    <a class="Scategory{{$SCategoryPlus}} text-dark text-center d-flex align-items-center justify-content-center flex-column position-absolute border-end" style="right: {{$absolot += 200}}px ; width: 200px ; height: 200px ; float: right ; text-decoration: none">
                        <img width="60%" src="{{url('images/'.$category->image)}}">
                        <b>{{$category->name}}</b>
                    </a>
                    <script>
                        if(window.navigator.userAgent.indexOf("Chrome") > 0) {
                            let Scategory{{$SCategoryPlus}} = document.querySelector('.Scategory{{$SCategoryPlus}}');
                            Scategory{{$SCategoryPlus}}.addEventListener('mousedown', function (e) {
                                Scategory{{$SCategoryPlus}}.setAttribute('href', '{{route('product.category.index' , $category->id)}}')
                            })
                            Scategory{{$SCategoryPlus}}.addEventListener('mousemove', function (e) {
                                setTimeout(function (){
                                    Scategory{{$SCategoryPlus}}.removeAttribute('href')
                                },500)

                            })
                        }else {
                            let Scategory{{$SCategoryPlus}} = document.querySelector('.Scategory{{$SCategoryPlus}}');
                            Scategory{{$SCategoryPlus}}.addEventListener('mousedown', function (e) {
                                Scategory{{$SCategoryPlus}}.setAttribute('href', '{{route('product.category.index' , $category->id)}}')
                            })
                            Scategory{{$SCategoryPlus}}.addEventListener('mousemove', function (e) {
                                Scategory{{$SCategoryPlus}}.removeAttribute('href')
                            })
                        }
                    </script>
                @endif
            @endforeach
        </div>
        <i class="kala-SCategory-btnRight bi-chevron-right position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
    </div>
</div>





{{--brans--}}
<div class="w-100">
    <div class="kala-brands m-auto mt-4 border">
        <div class="d-flex align-items-center justify-content-center py-4">
            <i class="bi-star-fill me-3 text-warning h4"></i>
            <h3> محبوب‌ترین برندها</h3>
        </div>
        <div class="position-relative kala-specialBrands-main ">
            <i class="kala-SBrands-btnLeft bi-chevron-left position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
            <div class="w-100 kala-specialBrands position-relative overflow-hidden ">
                @php
                    $absolott = -200;
                    $brandPlus = 0;
                @endphp
                @foreach($brands as $brand)
                    @php
                        $brandPlus += 1;
                    @endphp
                    <a  class="brandLink{{$brandPlus}} text-dark text-center d-flex align-items-center justify-content-center flex-column position-absolute border-end" style="right: {{$absolott += 200}}px ; width: 200px ; height: 130px ; text-decoration: none">
                        <img height="60%" src="{{url('images/'.$brand->logo)}}">
                        <b class="mt-1">{{$brand->name}}</b>
                    </a>
                    <script>
                        if(window.navigator.userAgent.indexOf("Chrome") > 0) {
                            let brandLink{{$brandPlus}} = document.querySelector('.brandLink{{$brandPlus}}');
                            brandLink{{$brandPlus}}.addEventListener('mousedown', function (e) {
                                brandLink{{$brandPlus}}.setAttribute('href', '{{route('product.brands.index' , $brand->id)}}')
                            })
                            brandLink{{$brandPlus}}.addEventListener('mousemove', function (e) {
                                setTimeout(function (){
                                    brandLink{{$brandPlus}}.removeAttribute('href')
                                } , 500)

                            })
                        }else {
                            let brandLink{{$brandPlus}} = document.querySelector('.brandLink{{$brandPlus}}');
                            brandLink{{$brandPlus}}.addEventListener('mousedown', function (e) {
                                brandLink{{$brandPlus}}.setAttribute('href', '{{route('product.brands.index' , $brand->id)}}')
                            })
                            brandLink{{$brandPlus}}.addEventListener('mousemove', function (e) {
                                brandLink{{$brandPlus}}.removeAttribute('href')
                            })
                        }
                    </script>
                @endforeach
            </div>
            <i class="kala-SBrands-btnRight bi-chevron-right position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
        </div>
    </div>
</div>






<div class="w-100 mt-4">
    <div class="kala-category-oneItem-box m-auto d-flex align-items-center justify-content-center">
        @foreach($homeView1 as $item)
            @if($item->id == 8)
                <a href="{{route('product.brands.index' , $item->brand_id)}}" class="kala-category-oneItem d-flex align-items-center justify-content-center p-2">
                    <img width="97%" src="{{url('images/'.$item->image)}}">
                </a>
            @endif
        @endforeach
    </div>
</div>








{{--moresELL--}}
<div class="w-100 mt-4">
    <div class="kala-moreSell-box m-auto border position-relative">
        <div class="d-flex align-items-center justify-content-start justify-content-lg-center py-4 position-relative">
            <i class="bi-fire h4 text-warning me-3"></i>
            <h3 class="text-start ">پرفروش‌ترین کالاها </h3>
            <a href="{{route('product.moreSell.index')}}" class="position-absolute text-info" style="left: 20px ; top: 30px ; text-decoration: none">
                <b>مشاهده همه</b>
                <i class="bi-chevron-left"></i>
            </a>

        </div>


        <i class="kala-moreSell-btnLeft bi-chevron-left position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
        <div class="w-100 kala-moreSell position-relative overflow-hidden">
            @php
                $variationCount =count($variation1);
                $boxNum = round($variationCount/3);
                $baseNum = -3;
                $boxsRight = -300;
                $numvar = 0;
                $moresell = 1;
            @endphp
            @for($v = 0 ; $v <$boxNum ; $v++)
                <div class="position-absolute" style="right: {{$boxsRight += 300}}px ; width: 300px ; height: 298px">
                    @php
                        $baseNum += 3;

                    @endphp
                    @for($j = $baseNum ; $j < $baseNum+3 ; $j++)
                        @php
                            $moresell += 1;
                        @endphp
                        <a target="_blank" class="moresell{{$moresell}} w-100 d-flex align-items-center justify-content-around text-dark" style="height: 100px ; text-decoration: none ; cursor: pointer">
                            @php
                                $imageNum = explode(',', $variation1[$j]->product->image) ;
                            @endphp
                            <img width="80px" src="{{url('images/'.$imageNum[0])}}">
                            <div class="d-flex align-items-center justify-content-center text-info h3" style="width: 20px">{{$numvar += 1}}</div>
                            <div class="{{$numvar % 3 !== 0 ? 'border-bottom' : ''}} d-flex align-items-center justify-content-start " style="width: 150px ; font-size: 15px ; height: 100% ">
                                <div class="w-100 overflow-hidden" style="white-space: nowrap ; text-overflow: ellipsis">{{$variation1[$j]->product->name}}</div>
                            </div>
                        </a>
                        <script>
                            let moresell{{$moresell}} = document.querySelector('.moresell{{$moresell}}');
                            moresell{{$moresell}}.addEventListener('mousedown' , function (){
                                moresell{{$moresell}}.setAttribute('href' , '{{route('productView' , $variation1[$j]->products->id)}}')
                            })
                            moresell{{$moresell}}.addEventListener('mousemove' , function (){
                                moresell{{$moresell}}.removeAttribute('href')
                            })
                        </script>
                    @endfor
                </div>
            @endfor
        </div>
        <i class="kala-moreSell-btnRight bi-chevron-right position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
    </div>
</div>





{{--    Article 4Pic--}}

<div class="w-100 my-5">
    <div class="kala-article-fourItem-box m-auto">
        <h4 class="ms-5"><b style="font-size: 18px">خواندنی‌ها</b> </h4>
        @foreach($articles as $article)
                <a href="{{route('article.index' , $article->id)}}" style="text-decoration: none" class="text-dark kala-article-fourItem d-flex align-items-center justify-content-center p-3">
                    <div class="w-100 border" style=" border-radius: 12px">
                        <img width="100%" src="{{url('images/'.$article->logo)}}">
                        <div class="w-100 p-2 py-3">{{$article->subject}}</div>
                    </div>
                </a>
        @endforeach
    </div>
</div>
@endsection


@vite(['resources/js/home.js'])
