@extends('layouts.app')
@vite(['resources/css/view.css'])
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('main')

    <script>
        let basketNumberview = document.querySelector('.basketNumberview');
        let test = Number(basketNumberview.innerHTML) ;
    </script>




    @if($products[0]->active == 0)
        <div class="h-100 w-100 bg-secondary text-light d-flex align-items-center justify-content-center opacity-50">
            <p class="opacity-25 " style="font-size: 80px ; text-shadow: 0 0 10px black">غیر فعال!</p>
        </div>
    @else



<div class="w-100 mt-4">
    <div class="kala-buy-box m-auto border-bottom border-2 py-2">


{{--        pictureBox--}}
        <div class="kala-buy-box-ax" style="cursor: pointer;">
            <div class="w-100 px-4 position-relative" style="height: 30px">

                @if(auth()->check())
                <i class="bi-heart-fill h2 text-danger position-absolute favoriteOk" style="display: {{count($favorite) > 0 ? 'block' : 'none'}}"></i>
                <i class="bi-heart h2  position-absolute favoriteNo" style="display: {{count($favorite) > 0 ? 'none' : 'block'}}"></i>
                @else
                    <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="text-dark">
                        <i class="bi-heart h2  position-absolute favoriteNo" style="display: {{count($favorite) > 0 ? 'none' : 'block'}}"></i>
                    </a>
                @endif
            </div>

            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let favoriteOk = document.querySelector('.favoriteOk');
                let favoriteNo = document.querySelector('.favoriteNo');
                let product_id = {{$products[0]->id}};
                favoriteOk.addEventListener('click' , function (){
                    this.style.display = "none";
                    favoriteNo.style.display = "block";

                    $.ajax({
                        url:'{{route('favorite.destroy')}}',
                        method:'POST',
                        data:{
                            product : product_id,
                        },
                        success:function(data){
                            // console.log(data)
                        },

                    });


                })
                favoriteNo.addEventListener('click' , function (){
                    this.style.display = "none";
                    favoriteOk.style.display = "block";
                    dataFavoriteNo = 1;

                    $.ajax({
                        url:'{{route('favorite.insert')}}',
                        method:'POST',
                        data:{
                            product : product_id,
                        },
                        success:function(data){
                            // console.log(data)
                        },

                    });
                })
            </script>


            <div class="inner-big" data-bs-toggle="modal" data-bs-target="#exampleModalBig">
                @php
                    $images = explode(',' ,$products[0]->image);
                    $countimage =  count($images);
                @endphp
                <img class="kala-buy-box-ax-ax p-3" src="{{url('images/'.$images[0])}}">
                <div class="w-100 py-1 d-flex align-items-center justify-content-center" >
                    @php
                        $images = explode(',' ,$products[0]->image);
                        $countimage =  count($images);
                    @endphp
                    @if($countimage > 6)
                        @for($v=1 ; $v<6 ; $v++)
                            <img class="border border-2 rounded rounded-3 kala-buy-box-ax-footer opacity-50 me-1" src="{{url('images/'.$images[$v])}}" style="width: 18%">
                        @endfor
                    @else
                        @for($v=1 ; $v<$countimage-1 ; $v++)
                            <img class="border border-2 rounded rounded-3 kala-buy-box-ax-footer opacity-50 me-1" src="{{url('images/'.$images[$v])}}" style="width: 18%">
                        @endfor
                    @endif
                </div>
            </div>
            {{--pictures modal--}}
            <div class="modal fade" id="exampleModalBig" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style=" width: 1000px!important">
                    <div class="modal-content " style="width: 100% ; height: 95vh ; border-radius: 10px">

                        <div id="carouselExampleIndicatorsBig" class="carousel carousel-dark slide h-100 p-2"  data-bs-touch="true">
                            <div class="carousel-indicators overflow-scroll w-75">
                                @php
                                    $images = explode(',' ,$products[0]->image);
                                    $countimage =  count($images);
                                @endphp
                                @for($v=0 ; $v<$countimage-1 ; $v++)
                                    <img src="{{url('images/'.$images[$v])}}" type="button" data-bs-target="#carouselExampleIndicatorsBig" style="bottom: 20px ; width: 80px ; height: 80px" data-bs-slide-to="{{$v}}" class=" {{$v == 0 ? 'active' : ''}}  border border-2 rounded rounded-3" aria-current=" {{$v == 0 ? 'true' : ''}}" aria-label=" {{$v == 0 ? 'slide'.$v+1 : ''}}"/>
                                @endfor
                            </div>
                            <div class="carousel-inner w-100">
                                @php
                                    $images = explode(',' ,$products[0]->image);
                                    $countimage =  count($images);
                                @endphp
                                @for($v=0 ; $v<$countimage-1 ; $v++)
                                    <div class="carousel-item {{$v == 0 ? 'active' : ''}}">
                                        <img src="{{url('images/'.$images[$v])}}" class="d-block h-75 m-auto" alt="...">
                                    </div>
                                @endfor

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsBig" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsBig" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden bg-danger">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-smoll">
                <div id="carouselExampleIndicatorsB" class="carousel carousel-dark slide w-100 py-2" data-bs-touch="false">
                    <div class="carousel-inner w-100">
                        @php
                            $images = explode(',' ,$products[0]->image);
                            $countimage =  count($images);
                        @endphp
                        @for($v=0 ; $v<$countimage-1 ; $v++)
                            <div class="carousel-item {{$v == 0 ? 'active' : ''}}">
                                <img src="{{url('images/'.$images[$v])}}" class="d-block w-100 m-auto" alt="...">
                            </div>
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsB" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsB" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden bg-danger">Next</span>
                    </button>
                </div>
            </div>
        </div>

        {{--        nameBox--}}
        <div class="kala-buy-box-name" >
            <div class="mt-4" style="font-weight: 700">
                <a href="{{route('product.brands.index' , $products[0]->brand_id)}}" class="text-info" style="text-decoration: none">{{$products[0]->brand->name}}</a>
            </div>
            <div class="h5 mt-1 px-2" style="font-weight: 700  ; line-height: 2">
                {{$products[0]->name}}
            </div>
            <div class=" mt-5 borderSellect1" style="height: 100px">
                @php
                    $variety_id = [];
                @endphp
                @foreach($varieties as $variety)
                    @if(!in_array($variety->variety , $variety_id))
                        @php
                            array_push($variety_id , $variety->variety);
                        @endphp
                        @if($variety->products->variety_type == 'color')
                            <div class="me-3  rounded-circle mt-2 shadow kala-buy-box-name-varieties{{$variety->variety}}" style="background-color: {{$variety->color->color}} ; width: 45px ; height: 45px ; float: right ; cursor: pointer ; border:4px solid {{$variety->variety == $variety_id[0] ? ' #3dd5f3' : 'white'}} " title="{{$variety->color->name}}"></div>
                        @elseif($variety->products->variety_type == 'size')
                            <div class="me-3  rounded-3 mt-2 bg-light p-1 shadow-sm kala-buy-box-name-varieties{{$variety->variety}}" style=" float: right ; cursor: pointer; border:4px solid {{$variety->variety == $variety_id[0] ? ' #3dd5f3' : 'white'}} ">{{$variety->size->size}} </div>
                        @elseif($variety->products->variety_type == 'Weight')
                            <div class="me-3  rounded-3 mt-2 bg-light p-1 shadow-sm kala-buy-box-name-varieties{{$variety->variety}}" style=" float: right ; cursor: pointer; border:4px solid {{$variety->variety == $variety_id[0] ? ' #3dd5f3' : 'white'}} ">{{$variety->Weight->weight}} </div>
                        @elseif($variety->products->variety_type == 'volume')
                            <div class="me-3  rounded-3 mt-2 bg-light p-1 shadow-sm kala-buy-box-name-varieties{{$variety->variety}}" style=" float: right ; cursor: pointer; border:4px solid {{$variety->variety == $variety_id[0] ? ' #3dd5f3' : 'white'}} ">{{$variety->volume->volume}} </div>
                        @elseif($variety->products->variety_type == 'number')
                            <div class="me-3  rounded-3 mt-2 bg-light p-1 shadow-sm kala-buy-box-name-varieties{{$variety->variety}}" style=" float: right ; cursor: pointer; border:4px solid {{$variety->variety == $variety_id[0] ? ' #3dd5f3' : 'white'}} ">{{$variety->num->number}} </div>
                        @elseif($variety->products->variety_type == 'null')
                        @endif

                    @endif
                @endforeach
            </div>

            <table class="ms-2 ">
                <tr>
                    <td class="py-2 px-2" style="color: grey"> طول : </td>
                    <td class="py-2 " style="font-weight: 600">{{$products[0]->width . ' سانتی‌متر'}}</td>
                </tr>
                <tr>
                    <td class="py-2  px-2" style="color: grey"> عرض : </td>
                    <td class="py-2 " style="font-weight: 600"> {{$products[0]->height . ' سانتی‌متر'}} </td>
                </tr>
                <tr>
                    <td class="py-2  px-2" style="color: grey"> ارتفاع : </td>
                    <td class="py-2 " style="font-weight: 600">{{$products[0]->depth . ' سانتی‌متر'}}</td>
                </tr>
                <tr>
                    <td class="py-2  px-2" style="color: grey"> وزن : </td>
                    <td class="py-2 " style="font-weight: 600">{{$products[0]->Weight . ' گرم'}}</td>
                </tr>
            </table>
        </div>

        {{--        priceBox--}}
        <div class="kala-buy-box-price h5 nnnnn1 d-flex align-items-end justify-content-end" style="z-index: 9 ; ">

            @if(count($varieties) == 0)
                <div class=" bg-light border h1 kala-buy-box-name-topFeeUnknown d-flex align-items-center justify-content-center" >
                <h1 class="opacity-25"> ناموجود </h1>
                </div>
            @endif


            @php
                $varCount = count($variety_id);
            @endphp
            @for($v = 0; $v < $varCount; $v++)
                <div class=" bg-light border kala-buy-box-name-topFee{{$variety_id[$v]}}" style=" display: {{$v == 0 ? 'block' : 'none'}}">
                    @foreach($varieties as $variety)
                        @if($variety->variety == $variety_id[$v])
                            <div class="w-100 h4 p-3 sellerTop{{$variety_id[$v]}} align-items-center justify-content-between" style="font-weight: 600 ; height: 11%">فروشنده
                                <div class="">
                                    @if($variety->special == 1)
                                        @php
                                            echo file_get_contents('image/IncredibleOffer.svg');
                                        @endphp
                                    @endif
                                </div>
                            </div>
                            <div class="w-100 h4 p-3 border-bottom sellerTop{{$variety_id[$v]}}" style="font-weight: 500 ; height: 13%">
                                <i class="bi-shop h2 me-5" ></i>
                                {{$variety->user->seller_name}}
                            </div>
                            <div class="w-100  px-3 py-3 border-bottom sellerTop{{$variety_id[$v]}}"  style="font-weight: 600 ; height: 12%">
                                <i class="bi-check2-circle h4 me-3 " ></i>
                                گارانتی
                                {{$variety->warranty->period}}
                                {{$variety->warranty->name}}
                            </div>

                            <div class="w-100  p-3 border-bottom sellerTop{{$variety_id[$v]}}" style="font-weight: 600 ; height: 12%">
                                <i class="bi-hdd-stack h3 me-2 text-info" ></i>
                                موجود در انبار دیجی کالا
                            </div>









                        <style>
                            .btmBuuBoxMain1{{$variety_id[$v]}}{
                                margin-top: 80px;
                            }
                            @media (max-width: 1400px) {
                                .btmBuuBoxMain1{{$variety_id[$v]}}{
                                    margin-top: 50px;
                                }
                            }
                            @media (max-width: 1250px) {
                                .btmBuuBoxMain1{{$variety_id[$v]}}{
                                    margin-top: 40px;
                                }
                            }
                            @media (max-width: 1170px) {
                                .btmBuuBoxMain1{{$variety_id[$v]}}{
                                    margin-top: 10px;
                                }
                            }
                            @media (max-width: 1023px) {
                                .ffffff{
                                    display: flex!important;
                                }
                                .ffffft{
                                    width: 50%;
                                    height: 90px !important;
                                }
                                .btmBuuBoxMain1{
                                    width: 50% !important;
                                    height: 90px!important;
                                    margin-top: 0;
                                    /*align-items: end;*/
                                }
                            }



                        </style>

                        <div class="ffffff" style="direction: ltr ; display: block">



                        <div class="ffffft " style="direction: rtl ; height: 25%">
                            @if($variety->price_off != $variety->price)

                                <div class="p-3">
                                    <div class="text-end">
                                        <div class=" h5 d-inline-block me-3" style="font-weight: 600 ; color: #bebebe ; text-decoration: line-through">
                                            {{number_format($variety->price/10) }}
                                        </div>
                                        <div class="bg-danger d-inline-block px-2 text-white h5 rounded-pill">{{(round(1-($variety->price_off/$variety->price) , 2)*100).'%'  }}</div>
                                    </div>
                                    <div class=" h4 text-end py-2">
                                        {{number_format($variety->price_off/10) }}
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp

                                    </div>
                                </div>

                            @else
                                <div class="w-100 h-100 h4 d-flex align-items-center justify-content-end px-3" >
                                    {{number_format($variety->price_off/10) }}
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </div>
                            @endif
                        </div>



                            @php
                                $isInBasket = [];
                            @endphp

                            @if(count($basketItem) != 0)
                                @foreach($basketItem as $key=>$search)
                                    @php
                                        array_push($isInBasket , $basketItem[$key]['id'])
                                    @endphp
                                @endforeach
                            @endif




                        <div class="btmBuuBoxMain1 d-flex align-items-center justify-content-center" style="width: 100% ; display: flex ; align-items: center ; justify-content: center ; direction: rtl ; height: 24%">
                            @auth()

                                <div class=" btn-danger h5 shadow-sm d-flex  align-items-center justify-content-center" style="border-radius: 10px ; font-weight: 700 ; width: 75% ; white-space: nowrap ; height: 50px ">


                                    <div class="w-100 h-100  align-items-center justify-content-center bg-light border-2 border  rounded-3" style="display: {{in_array($variety->id , $isInBasket)  ? 'flex' : 'none'}} ">
                                        <div class="px-2 h-100 d-flex align-items-center justify-content-center pt-2" style="width: 40px ; cursor: pointer"><i class="bi-plus-lg h3 text-danger addpluseTopOne{{$variety->id}}" style="display:
                                            @if(in_array($variety->id , $isInBasket))
                                            @foreach($basketItem as $key=>$value)
                                            @if($variety->id == $value['id'])
                                            @if($value['number'] == $variety->remain)
                                                none
                                            @else
                                                block
                                            @endif
                                            @endif
                                            @endforeach
                                            @else
                                                block
                                            @endif
                                            "></i></div>

                                        <div class="px-2 h2 text-danger addpluseTopTow h-100 d-flex align-items-center justify-content-center"  style="width: 40px">

                                            @if(in_array($variety->id , $isInBasket))
                                                @foreach($basketItem as $value)
                                                    @if($variety->id == $value['id'])
                                                        {{$value['number']}}
                                                    @endif
                                                @endforeach
                                            @else
                                                {{0}}
                                            @endif

                                        </div>
                                        <div class="px-2 h-100 d-flex align-items-center justify-content-center pt-2" style="width: 40px ; cursor: pointer"><i class="bi-dash-lg h3 text-danger  addpluseTopThree{{$variety->id}}"></i></div>
                                    </div>


                                    <div class="w-100 h-100   align-items-center justify-content-center btmBuuBox{{$variety->id}}" style="cursor: pointer ; display: {{in_array($variety->id , $isInBasket)  ? 'none' : 'flex'}}" >افزودن به سبد خرید</div>


                                </div>

                                <script>
                                    let buy{{$variety->id}} = @if(in_array($variety->id , $isInBasket))
                                        @foreach($basketItem as $value)
                                        @if($variety->id == $value['id'])
                                        {{$value['number']}}
                                        @endif
                                        @endforeach
                                        @else
                                        {{0}}
                                        @endif;

                                    let btmBuuBox{{$variety->id}} = document.querySelector('.btmBuuBox{{$variety->id}}');
                                    btmBuuBox{{$variety->id}}.addEventListener('click' , function (){

                                        test += 1 ;
                                        basketNumberview.style.display = 'flex';
                                        basketNumberview.innerText = test;


                                        buy{{$variety->id}} += 1;

                                        let addpluseTopOne{{$variety->id}} = btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0];

                                        if (buy{{$variety->id}} === {{$variety->remain}}){
                                            addpluseTopOne{{$variety->id}}.style.display = 'none';
                                        }else {
                                            addpluseTopOne{{$variety->id}}.style.display = 'block';
                                        }

                                        btmBuuBox{{$variety->id}}.parentNode.childNodes[1].style.display = 'flex';
                                        btmBuuBox{{$variety->id}}.parentNode.childNodes[3].style.display = 'none';
                                        btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buy{{$variety->id}};

                                        {{--console.log(btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0])--}}

                                        $.ajax({
                                            url:'{{route('basket.store')}}',
                                            method:'post',
                                            data:{
                                                id : {{$variety->id}},
                                                price : {{$variety->price_off}},
                                                number : 1,
                                            },
                                            success:function(data){
                                            },
                                        });

                                    });

                                    let addpluseTopOne{{$variety->id}} = btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0];
                                    addpluseTopOne{{$variety->id}}.addEventListener('click' , function (){

                                        test += 1 ;
                                        basketNumberview.innerText = test;


                                        buy{{$variety->id}} += 1;
                                        btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buy{{$variety->id}};
                                        if (buy{{$variety->id}} === 0){
                                            addpluseTopThree{{$variety->id}}.style.display = 'none';
                                        }else {
                                            addpluseTopThree{{$variety->id}}.style.display = 'block';
                                        }

                                        if (buy{{$variety->id}} === {{$variety->remain}}){
                                            addpluseTopOne{{$variety->id}}.style.display = 'none';
                                        }else {
                                            addpluseTopOne{{$variety->id}}.style.display = 'block';
                                        }
                                        $.ajax({
                                            url:'{{route('basket.store')}}',
                                            method:'post',
                                            data:{
                                                id : {{$variety->id}},
                                                price : {{$variety->price_off}},
                                                number : 1,
                                            },
                                            success:function(data){
                                            },
                                        });
                                    })

                                    let addpluseTopThree{{$variety->id}} = btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[5].childNodes[0];
                                    addpluseTopThree{{$variety->id}}.addEventListener('click' , function (){

                                        test -= 1 ;
                                        basketNumberview.innerText = test;

                                        buy{{$variety->id}} -= 1;
                                        btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buy{{$variety->id}};
                                        if (buy{{$variety->id}} === 0){
                                            addpluseTopThree{{$variety->id}}.style.display = 'none';
                                        }else {
                                            addpluseTopThree{{$variety->id}}.style.display = 'block';
                                        }

                                        if (buy{{$variety->id}} === {{$variety->remain}}){
                                            addpluseTopOne{{$variety->id}}.style.display = 'none';
                                        }else {
                                            addpluseTopOne{{$variety->id}}.style.display = 'block';
                                        }

                                        $.ajax({
                                            url:'{{route('basket.destroy')}}',
                                            method:'post',
                                            data:{
                                                id : {{$variety->id}},
                                                price : {{$variety->price_off}},
                                                number : 1,
                                            },
                                            success:function(data){
                                            },
                                        });
                                    });

                                </script>
                            @else
                                <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="btn btn-danger  shadow-sm  py-3 btmBuuBox{{$variety_id[$v]}}" style="border-radius: 10px ; font-weight: 700 ; width: 75% ; white-space: nowrap "> افزودن به سبد خرید</a>
                            @endauth

                        </div>

                        </div>


                            @break;
                        @endif
                    @endforeach
                </div>
                <style>
                    .kala-buy-box-name-topFee{{$variety_id[$v]}}{
                        width: 80% ;
                        height: 530px;
                        border-radius: 10px;
                        position: relative;
                        bottom: 0;
                        left: 0;
                        transition: 0.3s;
                    }

                    .sellerTop{{$variety_id[$v]}}{
                        display: flex;
                    }
                    .ffee{
                        font-weight: 600 ;
                        padding: 0 30px;
                    }
                    .price{
                        width: 100%;
                        padding: 20px 30px;
                        margin-top: 10px;
                    }
                    .price_off{
                        width: 100%;
                        padding: 10px 30px;
                        font-weight: 600;
                    }
                    @media (max-width: 1400px) {
                        .kala-buy-box-name-topFee{{$variety_id[$v]}}{
                            height: 500px;
                        }


                    }
                    @media (max-width: 1250px) {
                        .kala-buy-box-name-topFee{{$variety_id[$v]}}{
                            height: 480px;
                            width: 90%;
                        }

                    }

                    @media (max-width: 1170px) {
                        .kala-buy-box-name-topFee{{$variety_id[$v]}}{
                            height: 430px;
                        }

                        .price{
                            padding: 10px 30px;
                        }
                    }
                    @media (max-width: 1023px) {
                        .kala-buy-box-name-topFee{{$variety_id[$v]}}{
                            width: 100% ;
                            height: 100px;
                            border-radius: 0;
                            position: relative;
                            transition: 0.3s;
                        }


                        .sellerTop{{$variety_id[$v]}}{
                            display: none;
                        }
                        .btmBuuBoxMain{{$variety_id[$v]}}{
                            justify-content: start!important;
                            padding: 0 10px;
                        }
                        .btmBuuBox{{$variety_id[$v]}}{
                            width: 45% !important;
                            right: 20px!important;
                            margin: unset;
                        }
                        .price{
                            width: 100%;
                            padding: 0 30px;
                            margin-top: 10px;
                        }
                        .price_off{
                            width: 100%;
                            padding: 10px 30px;
                            font-weight: 600;
                        }
                    }
                </style>
            @endfor
        </div>
    </div>
</div>


<div class="mt-5 px-3 text-info otherSellerModalBTN py-2" data-bs-toggle="modal" data-bs-target="#exampleModalSeller"> همه فروشندهها </div>



    <div class="modal fade" id="exampleModalSeller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content position-relative">




                <div class="w-100 mt-2 m-auto px-4 paeen1 py-5 overflow-scroll" style="height: 90vh;">
                    @php
                        $varCount = count($variety_id);
                    @endphp
                    @for($v = 0; $v < $varCount; $v++)
                        @php
                            $AddArray = [];
                        @endphp
                        @foreach($varieties as $variety)
                            @if($variety->variety == $variety_id[$v])
                                @php
                                    array_push($AddArray , $variety->id);
                                @endphp
                                @if(count($AddArray) > 1)
                                <div class="border  mt-2  kala-buy-box-name-downFee2{{$variety->variety}} flex-column"  style="display: {{$v == 0 ? 'flex' : 'none'}} ; border-radius: 10px">




                                    <div class="h4 py-3 ps-4 w-100 sellerDown2{{$variety_id[$v]}}" style="font-weight: 500">
                                        <i class="bi-shop h2 me-5" ></i>
                                        {{$variety->user->seller_name}}
                                    </div>
                                    <div class="py-4 ps-4 w-100 sellerDown2{{$variety_id[$v]}}"  style="font-weight: 500; font-size: 12px">
                                        <i class="bi-check2-circle h4 me-3 " ></i>
                                        گارانتی
                                        {{$variety->warranty->period}}
                                        {{$variety->warranty->name}}
                                    </div>

                                    <div class="py-3 ps-4 w-100 sellerDown2{{$variety_id[$v]}}" style="font-weight: 500 ; font-size: 12px">
                                        <i class="bi-truck h3 me-2 text-danger" ></i>
                                        ارسال توسط دیجی کالا
                                    </div>

                                    @if($variety->price_off != $variety->price)
                                        <div class="d-flex  ps-4 w-100">
                                            <div class="text-end Bprice2 d-flex py-4">
                                                <div class="  d-inline-block me-3" style="font-size: 12px ; color: #bebebe ; text-decoration: line-through">
                                                    {{number_format($variety->price/10) }}
                                                </div>
                                                <div class="bg-danger d-inline-block px-2 text-white  rounded-pill" style="height: 22px">{{(round(1-($variety->price_off/$variety->price) , 2)*100).'%'  }}</div>
                                            </div>
                                            <div class="h5 text-end Bprice_off2 d-flex p-4">
                                                {{number_format($variety->price_off/10) }}
                                                @php
                                                    echo file_get_contents('images/toman.svg');
                                                @endphp

                                            </div>
                                        </div>

                                    @else
                                        <div class="ps-4 w-100 d-flex">
                                            <div class="h4 text-end Bffee2"></div>
                                            <div class="d-flex p-4 h4   text-end Bffee2" >
                                                {{number_format($variety->price_off/10) }}
                                                @php
                                                    echo file_get_contents('images/toman.svg');
                                                @endphp
                                            </div>
                                        </div>

                                    @endif


                                    <div class="py-2 m-auto" style="direction: ltr">
                                        <div class=" w-100 h-100 d-flex align-items-center pe-2  justify-content-start btmBuuBoxMain2{{$variety_id[$v]}}">
                                            @auth()


                                                <div class=" btn-danger  shadow-sm  d-flex  align-items-center justify-content-center" style="border-radius: 10px ; font-weight: 700  ; white-space: nowrap ; height: 60% ; direction: rtl ">


                                                    <div class="w-100 h-100  align-items-center justify-content-center bg-light border-2 border  rounded-3" style="display: {{in_array($variety->id , $isInBasket)  ? 'flex' : 'none'}} ">
                                                        <div class="px-2 h-100 d-flex align-items-center justify-content-center pt-2" style="width: 40px ; cursor: pointer;"><i class="bi-plus-lg h3 text-danger  addpluseTopOne2{{$variety->id}}" style="display:
                                                            @if(in_array($variety->id , $isInBasket))
                                                            @foreach($basketItem as $key=>$value)
                                                            @if($variety->id == $value['id'])
                                                            @if($value['number'] == $variety->remain)
                                                                none
                                                            @else
                                                                block
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                            @else
                                                                block
                                                            @endif
                                                                "></i></div>
                                                        <div class="px-2 h2 text-danger addpluseTopTow h-100 d-flex align-items-center justify-content-center"  style="width: 40px">

                                                            @if(in_array($variety->id , $isInBasket))
                                                                @foreach($basketItem as $value)
                                                                    @if($variety->id == $value['id'])
                                                                        {{$value['number']}}
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                {{0}}
                                                            @endif

                                                        </div>
                                                        <div class="px-2 h-100 d-flex align-items-center justify-content-center pt-2" style="width: 40px ; cursor: pointer"><i class="bi-dash-lg h3 text-danger  addpluseTopThree2{{$variety->id}}"></i></div>
                                                    </div>


                                                    <div class="w-100 h-100 p-3  align-items-center justify-content-center btmBuuBox2{{$variety->id}}" style="cursor: pointer ; display: {{in_array($variety->id , $isInBasket)  ? 'none' : 'flex'}}" >افزودن به سبد خرید</div>


                                                </div>

                                                <script>
                                                    let buyB{{$variety->id}} = @if(in_array($variety->id , $isInBasket))
                                                        @foreach($basketItem as $value)
                                                        @if($variety->id == $value['id'])
                                                        {{$value['number']}}
                                                        @endif
                                                        @endforeach
                                                        @else
                                                        {{0}}
                                                        @endif;

                                                    let btmBuuBox2{{$variety->id}} = document.querySelector('.btmBuuBox2{{$variety->id}}');
                                                    btmBuuBox2{{$variety->id}}.addEventListener('click' , function (){

                                                        test += 1 ;
                                                        basketNumberview.style.display = 'flex';
                                                        basketNumberview.innerText = test;


                                                        buyB{{$variety->id}} += 1;

                                                        let addpluseTopOne2{{$variety->id}} = btmBuuBox2{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0];

                                                        if (buyB{{$variety->id}} === {{$variety->remain}}){
                                                            addpluseTopOne2{{$variety->id}}.style.display = 'none';
                                                        }else {
                                                            addpluseTopOne2{{$variety->id}}.style.display = 'block';
                                                        }
                                                        btmBuuBox2{{$variety->id}}.parentNode.childNodes[1].style.display = 'flex';
                                                        btmBuuBox2{{$variety->id}}.parentNode.childNodes[3].style.display = 'none';
                                                        btmBuuBox2{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buyB{{$variety->id}};

                                                        {{--console.log(btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0])--}}

                                                        $.ajax({
                                                            url:'{{route('basket.store')}}',
                                                            method:'post',
                                                            data:{
                                                                id : {{$variety->id}},
                                                                price : {{$variety->price_off}},
                                                                number : 1,
                                                            },
                                                            success:function(data){
                                                            },
                                                        });

                                                    });

                                                    let addpluseTopOne2{{$variety->id}} = btmBuuBox2{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0];
                                                    addpluseTopOne2{{$variety->id}}.addEventListener('click' , function (){

                                                        test += 1 ;
                                                        basketNumberview.innerText = test;

                                                        buyB{{$variety->id}} += 1;
                                                        btmBuuBox2{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buyB{{$variety->id}};
                                                        if (buyB{{$variety->id}} === 0){
                                                            addpluseTopThree2{{$variety->id}}.style.display = 'none';
                                                        }else {
                                                            addpluseTopThree2{{$variety->id}}.style.display = 'block';
                                                        }

                                                        if (buyB{{$variety->id}} === {{$variety->remain}}){
                                                            addpluseTopOne2{{$variety->id}}.style.display = 'none';
                                                        }else {
                                                            addpluseTopOne2{{$variety->id}}.style.display = 'block';
                                                        }
                                                        $.ajax({
                                                            url:'{{route('basket.store')}}',
                                                            method:'post',
                                                            data:{
                                                                id : {{$variety->id}},
                                                                price : {{$variety->price_off}},
                                                                number : 1,
                                                            },
                                                            success:function(data){
                                                            },
                                                        });
                                                    })

                                                    let addpluseTopThree2{{$variety->id}} = btmBuuBox2{{$variety->id}}.parentNode.childNodes[1].childNodes[5].childNodes[0];
                                                    addpluseTopThree2{{$variety->id}}.addEventListener('click' , function (){

                                                        test -= 1 ;
                                                        basketNumberview.innerText = test;


                                                        buyB{{$variety->id}} -= 1;
                                                        btmBuuBox2{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buyB{{$variety->id}};
                                                        if (buyB{{$variety->id}} === 0){
                                                            addpluseTopThree2{{$variety->id}}.style.display = 'none';
                                                        }else {
                                                            addpluseTopThree2{{$variety->id}}.style.display = 'block';
                                                        }

                                                        if (buyB{{$variety->id}} === {{$variety->remain}}){
                                                            addpluseTopOne2{{$variety->id}}.style.display = 'none';
                                                        }else {
                                                            addpluseTopOne2{{$variety->id}}.style.display = 'block';
                                                        }

                                                        $.ajax({
                                                            url:'{{route('basket.destroy')}}',
                                                            method:'post',
                                                            data:{
                                                                id : {{$variety->id}},
                                                                price : {{$variety->price_off}},
                                                                number : 1,
                                                            },
                                                            success:function(data){
                                                            },
                                                        });
                                                    });

                                                </script>








                                            @else
                                                <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="btn btn-danger shadow-sm  py-2 btmBuuBox2{{$variety_id[$v]}}" style="border-radius: 10px ; font-weight: 700  ; white-space: nowrap ; height: 60%"> افزودن به سبد خرید</a>
                                            @endauth

                                        </div>
                                    </div>


                                </div>
                                <style>

                                </style>
                                @endif
                            @endif
                        @endforeach
                                @php
                                    $AddArray = [];
                                @endphp
                    @endfor
                </div>






                <div type="button" class="btn position-absolute" data-bs-dismiss="modal" style="left: 0; top: 0">
                        <i class="bi-x-lg h5"></i>
                    </div>
            </div>
        </div>
    </div>


{{--مشخصات تامین کننده اول وقتی صفحه کوچیک میشه--}}
    <div class=" mt-2 kkkkk1" >
        @for($v = 0; $v < $varCount; $v++)

            <div class="border kala-buy-box-name-topFee2{{$variety_id[$v]}}" style=" display: {{$v == 0 ? 'block' : 'none'}}">
                @foreach($varieties as $variety)
                    @if($variety->variety == $variety_id[$v])
                        <div class="w-100 h4 p-3 sellerTop2{{$variety_id[$v]}} d-flex align-items-center justify-content-between" style="font-weight: 600">فروشنده
                            <div class="">
                                @if($variety->special == 1)
                                    @php
                                        echo file_get_contents('image/IncredibleOffer.svg');
                                    @endphp
                                @endif
                            </div>
                        </div>
                        <div class="w-100 h4 p-3 border-bottom  sellerTop2{{$variety_id[$v]}}" style="font-weight: 500">
                            <i class="bi-shop h2 me-5" ></i>
                            {{$variety->user->seller_name}}
                        </div>
                        <div class="w-100  px-3 py-3 border-bottom sellerTop2{{$variety_id[$v]}}"  style="font-weight: 600">
                            <i class="bi-check2-circle h4 me-3 " ></i>
                            گارانتی
                            {{$variety->warranty->period}}
                            {{$variety->warranty->name}}
                        </div>

                        <div class="w-100  p-3 border-bottom sellerTop2{{$variety_id[$v]}}" style="font-weight: 600">
                            <i class="bi-hdd-stack h3 me-2 text-info" ></i>
                            موجود در انبار دیجی کالا
                        </div>

                        @break;
                    @endif
                @endforeach
            </div>
        @endfor
    </div>


{{--    مشخصات بقیه تامین کننده ها ی پایین صفحه--}}
    <div class="w-100 mt-2 m-auto px-4 mmmmm1" >
        @php
            $varCount = count($variety_id);
        @endphp
        @for($v = 0; $v < $varCount; $v++)
            @php
                $AddArray = [];
            @endphp
                @foreach($varieties as  $variety)
                    @if($variety->variety == $variety_id[$v])
                    @php
                    array_push($AddArray , $variety->id);
                    @endphp
                @if(count($AddArray) > 1)

                    <style>
                        .kala-buy-box-name-downFee{{$variety->variety}}{
                            width: 1550px;
                        }
                        @media (max-width: 1600px) {
                            .kala-buy-box-name-downFee{{$variety->variety}}{
                                width: 99%;
                            }
                        }
                    </style>

                        <div class="border  mt-2 m-auto kala-buy-box-name-downFee{{$variety->variety}}"  style="display: {{$v == 0 ? 'flex' : 'none'}} ; border-radius: 10px">



                            <div class="col-2  py-3 ps-4  sellerDown{{$variety_id[$v]}}" style="font-weight: 500">
                                <i class="bi-shop h2 me-1" ></i>
                                {{$variety->user->seller_name}}
                            </div>
                            <div class="col-3 py-4 sellerDown{{$variety_id[$v]}}"  style="font-weight: 500; font-size: 12px">
                                <i class="bi-check2-circle h4 me-3 " ></i>
                                گارانتی
                                {{$variety->warranty->period}}
                                {{$variety->warranty->name}}
                            </div>

                            <div class="col-2 py-3 sellerDown{{$variety_id[$v]}}" style="font-weight: 500 ; font-size: 12px">
                                <i class="bi-truck h3 me-2 text-danger" ></i>
                                ارسال توسط دیجی کالا
                            </div>

                            @if($variety->price_off != $variety->price)
                                <div class="col-3 d-flex">
                                    <div class="text-end Bprice d-flex py-4">
                                        <div class="  d-inline-block me-3" style="font-size: 12px ; color: #bebebe ; text-decoration: line-through">
                                            {{number_format($variety->price/10) }}
                                        </div>
                                        <div class="bg-danger d-inline-block px-2 text-white  rounded-pill" style="height: 22px">{{(round(1-($variety->price_off/$variety->price) , 2)*100).'%'  }}</div>
                                    </div>
                                    <div class="h5 text-end Bprice_off d-flex p-4">
                                        {{number_format($variety->price_off/10) }}
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp

                                    </div>
                                </div>

                            @else
                                <div class="col-3 d-flex">
                                    <div class="h4 text-end Bffee"></div>
                                    <div class="d-flex p-4 h4   text-end Bffee" >
                                        {{number_format($variety->price_off/10) }}
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </div>
                                </div>

                            @endif



                            <div class="col-2" style="direction: ltr">
                                <div class=" w-100 h-100 d-flex align-items-center pe-2  justify-content-start btmBuuBoxMain{{$variety_id[$v]}}">
                                    @auth()
{{--                                        <div class="btn btn-danger shadow-sm  py-2 btmBuuBox3{{$variety->id}}" style="border-radius: 10px ; font-weight: 700  ; white-space: nowrap ; height: 60%"> افزودن به سبد خرید</div>--}}





                                        <div class=" btn-danger  shadow-sm  d-flex  align-items-center justify-content-center" style="border-radius: 10px ; font-weight: 700 ; width: 75% ; white-space: nowrap ; height: 60% ; direction: rtl ">


                                            <div class="w-100 h-100  align-items-center justify-content-center bg-light border-2 border  rounded-3" style="display: {{in_array($variety->id , $isInBasket)  ? 'flex' : 'none'}} ">
                                                <div class="px-2 h-100 d-flex align-items-center justify-content-center pt-2" style="width: 40px ; cursor: pointer"><i class="bi-plus-lg h3 text-danger  addpluseTopOneC{{$variety->id}}" style="display:
                                                    @if(in_array($variety->id , $isInBasket))
                                                    @foreach($basketItem as $key=>$value)
                                                    @if($variety->id == $value['id'])
                                                    @if($value['number'] == $variety->remain)
                                                        none
                                                    @else
                                                        block
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    @else
                                                        block
                                                    @endif
                                                        "></i></div>
                                                <div class="px-2 h2 text-danger addpluseTopTow h-100 d-flex align-items-center justify-content-center"  style="width: 40px">

                                                    @if(in_array($variety->id , $isInBasket))
                                                        @foreach($basketItem as $value)
                                                            @if($variety->id == $value['id'])
                                                                {{$value['number']}}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        {{0}}
                                                    @endif

                                                </div>
                                                <div class="px-2 h-100 d-flex align-items-center justify-content-center pt-2" style="width: 40px ; cursor: pointer"><i class="bi-dash-lg h3 text-danger  addpluseTopThreeC{{$variety->id}}"></i></div>
                                            </div>


                                            <div class="w-100 h-100  p-2 align-items-center justify-content-center btmBuuBoxC{{$variety->id}}" style="cursor: pointer ; display: {{in_array($variety->id , $isInBasket)  ? 'none' : 'flex'}}" >افزودن به سبد خرید</div>


                                        </div>

                                        <script>
                                            let buyC{{$variety->id}} = @if(in_array($variety->id , $isInBasket))
                                                @foreach($basketItem as $value)
                                                @if($variety->id == $value['id'])
                                                {{$value['number']}}
                                                @endif
                                                @endforeach
                                                @else
                                                {{0}}
                                                @endif;

                                            let btmBuuBoxC{{$variety->id}} = document.querySelector('.btmBuuBoxC{{$variety->id}}');
                                            btmBuuBoxC{{$variety->id}}.addEventListener('click' , function (){

                                                test += 1 ;
                                                basketNumberview.style.display = 'flex';
                                                basketNumberview.innerText = test;

                                                buyC{{$variety->id}} += 1;
                                                let addpluseTopOneC{{$variety->id}} = btmBuuBoxC{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0];

                                                if (buyC{{$variety->id}} === {{$variety->remain}}){
                                                    addpluseTopOneC{{$variety->id}}.style.display = 'none';
                                                }else {
                                                    addpluseTopOneC{{$variety->id}}.style.display = 'block';
                                                }
                                                btmBuuBoxC{{$variety->id}}.parentNode.childNodes[1].style.display = 'flex';
                                                btmBuuBoxC{{$variety->id}}.parentNode.childNodes[3].style.display = 'none';
                                                btmBuuBoxC{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buyC{{$variety->id}};

                                                {{--console.log(btmBuuBox{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0])--}}

                                                $.ajax({
                                                    url:'{{route('basket.store')}}',
                                                    method:'post',
                                                    data:{
                                                        id : {{$variety->id}},
                                                        price : {{$variety->price_off}},
                                                        number : 1,
                                                    },
                                                    success:function(data){
                                                    },
                                                });

                                            });

                                            let addpluseTopOneC{{$variety->id}} = btmBuuBoxC{{$variety->id}}.parentNode.childNodes[1].childNodes[1].childNodes[0];
                                            addpluseTopOneC{{$variety->id}}.addEventListener('click' , function (){

                                                test += 1 ;
                                                basketNumberview.innerText = test;


                                                buyC{{$variety->id}} += 1;
                                                btmBuuBoxC{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buyC{{$variety->id}};
                                                if (buyC{{$variety->id}} === 0){
                                                    addpluseTopThreeC{{$variety->id}}.style.display = 'none';
                                                }else {
                                                    addpluseTopThreeC{{$variety->id}}.style.display = 'block';
                                                }

                                                if (buyC{{$variety->id}} === {{$variety->remain}}){
                                                    addpluseTopOneC{{$variety->id}}.style.display = 'none';
                                                }else {
                                                    addpluseTopOneC{{$variety->id}}.style.display = 'block';
                                                }
                                                $.ajax({
                                                    url:'{{route('basket.store')}}',
                                                    method:'post',
                                                    data:{
                                                        id : {{$variety->id}},
                                                        price : {{$variety->price_off}},
                                                        number : 1,
                                                    },
                                                    success:function(data){
                                                    },
                                                });
                                            })

                                            let addpluseTopThreeC{{$variety->id}} = btmBuuBoxC{{$variety->id}}.parentNode.childNodes[1].childNodes[5].childNodes[0];
                                            addpluseTopThreeC{{$variety->id}}.addEventListener('click' , function (){

                                                test -= 1 ;
                                                basketNumberview.innerText = test;


                                                buyC{{$variety->id}} -= 1;
                                                btmBuuBoxC{{$variety->id}}.parentNode.childNodes[1].childNodes[3].innerText = buyC{{$variety->id}};
                                                if (buyC{{$variety->id}} === 0){
                                                    addpluseTopThreeC{{$variety->id}}.style.display = 'none';
                                                }else {
                                                    addpluseTopThreeC{{$variety->id}}.style.display = 'block';
                                                }

                                                if (buyC{{$variety->id}} === {{$variety->remain}}){
                                                    addpluseTopOneC{{$variety->id}}.style.display = 'none';
                                                }else {
                                                    addpluseTopOneC{{$variety->id}}.style.display = 'block';
                                                }

                                                $.ajax({
                                                    url:'{{route('basket.destroy')}}',
                                                    method:'post',
                                                    data:{
                                                        id : {{$variety->id}},
                                                        price : {{$variety->price_off}},
                                                        number : 1,
                                                    },
                                                    success:function(data){
                                                    },
                                                });
                                            });

                                        </script>








                                    @else
                                        <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="btn btn-danger shadow-sm  py-2 btmBuuBox{{$variety_id[$v]}}" style="border-radius: 10px ; font-weight: 700  ; white-space: nowrap ; height: 60%"> افزودن به سبد خرید</a>
                                    @endauth

                                </div>
                            </div>


                        </div>
                    @endif
                    @endif
                @endforeach
            @php
                $AddArray = [];
            @endphp
        @endfor
    </div>





<div class="w-100 mt-4 ">
    <div class="kala-about-box bg m-auto">
        <div class="h5 py-3" style="font-weight: 600">درباره محصول</div>
        <div class="kala-about-text border p-3">
            {{$products[0]->about}}
        </div>
    </div>

</div>




{{--SimilarProducts--}}
<div class="w-100 px-4 mt-5">
    <div class="h5 m-auto py-2 SimilarProductsText" style="font-weight: 600 ; width: 1550px;"> محصولات مشابه</div>
</div>
<div class="w-100 mt-4">
    <div class="kala-Similar m-auto border  position-relative">
            <i class="kala-Similar-btnLeft bi-chevron-left position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
            <div class="w-100 kala-Similar-Box position-relative overflow-hidden">
                @php
                    $marginRight = -185;
                    $child = 0;
                    $Sproducts = 0;
                @endphp
                @foreach($varSimilar as $variety)
                    @php
                        $images = explode(',' ,$variety->product->image);
                        $Sproducts += 1;
                    @endphp
                    <a target="_blank" class="Sproducts{{$Sproducts}} kala-Similar-Box-var overflow-hidden me-1 border-start" style="right: {{$marginRight+=185}}px ; text-decoration: none ; border-radius:  {{$Sproducts == 1 ? '0 10px 10px 0' : '' }} {{$Sproducts == 15 ? '10px 0 0 10px' : '' }}">



                        <div class="p-2 d-flex align-items-start justify-content-center" style="width: 100% ; height: 180px">
                            <div class="" style="width: 90% ; height: 90% ; background-image: url('{{url('images/'.$images[0])}}'); background-size: cover ; background-position: center"></div>
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
            <i class="kala-Similar-btnRight bi-chevron-right position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
    </div>
</div>



<div class="w-100 mt-5 bg">
    <div class="kala-comment-box m-auto d-flex">

        <div class="kala-comment-box-add position-relative">
            <div class="position-sticky  m-auto p-2" style="width: 95% ; height: 300px ; border-radius: 10px ; top: 200px">
                @php
                $score = 0;
                $countComments = count($comments);
                @endphp
                @if($countComments > 0)
                    @foreach($comments as $comment)
                        @php
                            $score += $comment->score
                        @endphp
                    @endforeach
                <div class="w-100">
                    <h3 class="d-inline-block" style="font-weight: 600">{{round($score/$countComments , 1)}} </h3>
                    <div class="d-inline-block" style="font-size: 12px ; color: grey">از 5</div>
                </div>
                    <div class="w-100">
                        @if(round($score/$countComments) == 1)
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-secondary"></i>
                            <i class="bi-star-fill text-secondary"></i>
                            <i class="bi-star-fill text-secondary"></i>
                            <i class="bi-star-fill text-secondary"></i>
                        @elseif(round($score/$countComments) == 2)
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-secondary"></i>
                            <i class="bi-star-fill text-secondary"></i>
                            <i class="bi-star-fill text-secondary"></i>
                        @elseif(round($score/$countComments) == 3)
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-secondary"></i>
                            <i class="bi-star-fill text-secondary"></i>
                        @elseif(round($score/$countComments) == 4)
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-secondary"></i>
                        @elseif(round($score/$countComments) == 5)
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                            <i class="bi-star-fill text-warning"></i>
                        @endif
                    </div>
                @endif


                <p class="mt-5"> برای ثبت نظر خود کلیک کنید</p>
                @auth()
                    <div class="btn text-danger border border-danger w-100 m-auto" data-bs-toggle="modal" data-bs-target="#exampleModalAddComment"> ثبت دیدگاه </div>
                @else
                    <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="btn text-danger border border-danger w-100 m-auto"> ثبت دیدگاه </a>
                @endauth

            </div>
        </div>

        <!-- ModalAddComment -->
        <div class="modal fade" id="exampleModalAddComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content position-relative">

                    @if(auth()->check())
                        @php
                            $auth = auth()->user()->id;
                        @endphp
                    @else
                        @php
                            $auth = 1;
                        @endphp
                    @endif

                    <form class="w-100 formComment p-3 mt-5" method="post" action="{{route('products.comment.store' , ['product' => $products[0]->id , 'user'=> $auth])}}">
                        @csrf
                        <div class="border-bottom py-3">
                            <label style="font-weight: 600"> امتیاز (از 0 تا 5)</label>
                            <input type="range" name="score" min="0" max="5" class="form-range m-auto mt-1">
                            <div class="w-100  d-flex align-items-center justify-content-between" style="height: 20px">
                                <div class="">0</div>
                                <div class="">1</div>
                                <div class="">2</div>
                                <div class="">3</div>
                                <div class="">4</div>
                                <div class="">5</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-around py-3 border-bottom">
                            <div style="font-weight: 600">خرید این محصول را توصیه</div>
                            <input type="radio" id="html" name="proposal" value="ok" class="proposal">
                            <label for="html">می‌کنم</label><br>
                            <input type="radio" id="css" name="proposal" value="no"  class="proposal">
                            <label for="css">نمی‌کنم</label><br>
                        </div>
                        <div class="mt-3">
                            <label class="text-secondary" style="font-weight: 600">عنوان نظر</label>
                            <input type="text" class="w-100 border textareaComment mt-2 p-2 input-group-text text-start" style="outline: none ;" name="titr">
                        </div>
                        <div class="mt-3">
                            <label class="text-secondary" style="font-weight: 600">توضیحات</label>
                            <textarea class="w-100 border textareaComment mt-2 p-2 bg-light rounded-3 text-start" style="outline: none ; height: 200px" name="text"></textarea>
                        </div>
                        <button disabled class="btn btn-success my-4 m-auto d-block buttonComment">ارسال</button>
                    </form>



                        <div type="button" class="btn  position-absolute" data-bs-dismiss="modal" style="left: 0 ; top: 0">
                            <i class="bi-x-lg h4"></i>
                        </div>

                    <div class="position-absolute text-danger opacity-75 p-3"> پرکردن تمام فیلدها اجباریست </div>

                    <script>
                        let array = [];
                        let proposal = document.querySelectorAll('.proposal');
                        let formComment = document.querySelector('.formComment');
                        let textareaComment = document.querySelector('.textareaComment');
                        let buttonComment = document.querySelector('.buttonComment');
                        formComment.addEventListener('mousemove' , function (){
                            for (i = 0; i < proposal.length; i++){
                                array.push(proposal[i].checked);
                            }
                            if (array.includes(true) && textareaComment.value != ''){
                                buttonComment.removeAttribute('disabled');
                            }
                        })
                    </script>

                </div>
            </div>
        </div>


        <div class="kala-comment-view border-end border-start py-3">
            @if(count($comments) > 0)
                @foreach($comments as $comment)
                    <div class="border-bottom border-2 py-4 px-4">
                        <div class="w-100">
                            <div class="d-inline-block {{$comment->score < 2 ? "bg-danger" : ''}} {{$comment->score < 4 ? "bg-warning" : 'bg-success'}}  text-white px-3 rounded-3" style="font-weight: 600">{{$comment->score}}</div>
                            <div class="d-inline-block h5  px-3" style="font-weight: 600">{{$comment->titr}}</div>
                        </div>
                        <div class="w-100 mt-2 py-4 border-bottom">
                            <div class="d-inline-block opacity-50">{{verta($comment->created_at)->year}}/{{verta($comment->created_at)->month}}/{{verta($comment->created_at)->day}}</div>
                            <div class="d-inline-block opacity-50 ms-4">{{$comment->user[0]->name}}</div>
                            <div class="d-inline-block text-light opacity-50 ms-4 bg-secondary px-2 rounded-3">
                                @if(in_array($comment->user_id , $idOrders))
                                    حریدار
                                @endif
                            </div>
                        </div>
                        <div class="mt-1 border-bottom py-4">
                            @if($comment->proposal == 1)
                                <div class="text-success" style="font-weight: 600"><i class="bi-hand-thumbs-up h5 me-1"> </i>توصیه میکنم</div>
                            @else
                                <div class="text-danger" style="font-weight: 600"><i class="bi-hand-thumbs-down h5 me-1"> </i>توصیه نمیکنم</div>
                            @endif
                            <div class="d-inline-block mt-3  px-3" style="font-weight: 600">{{$comment->text}}</div>
                        </div>
                        <div class="w-100 py-2 opacity-50"> فروشگاه </div>
                    </div>
                @endforeach
            @else
                <h3 class="w-100 h-100 d-flex align-items-center justify-content-center opacity-25"> هیچ دیدگاهی وجود ندارد...</h3>
            @endif
        </div>

        <a href="" class="kala-comment-box-buy position-relative text-dark" style="text-decoration: none">
            <div class="position-sticky border m-auto bg-light" style="width: 95% ; height: 300px ; border-radius: 10px ; top: 200px">

                @php
                $image = explode(',' , $products[0]->image);
                @endphp
                <img src="{{url('images/' . $image[0])}}" class="m-auto d-block p-2" style="width: 80%">

                <div class="w-100 " style="height: 115px">

                    @if($products[0]->variation[0]->price == $products[0]->variation[0]->price_off)
                        <div class="w-100 h4 text-end p-5">
                            {{$products[0]->variation[0]->price}}
                            @php
                                echo file_get_contents('images/toman.svg');
                            @endphp

                        </div>

                    @else
                        <div class="w-100 mt-3 d-flex align-items-center justify-content-around">
                            <div class="bg-danger text-white rounded-pill px-1">{{(1-(round($products[0]->variation[0]->price_off / $products[0]->variation[0]->price , 2)))*100}}%</div>
                            <div class="opacity-50" style="text-decoration: line-through">{{number_format($products[0]->variation[0]->price/10) }}</div>
                        </div>
                        <div class="w-100 mt-3  px-5">
                            <div class="h4 text-end" style="font-weight: 600">{{number_format($products[0]->variation[0]->price_off/10) }}</div>
                        </div>
                    @endif
                </div>

            </div>
        </a>
    </div>
</div>



<div class="w-100 facke" style="height: 120px ; display: none"></div>






    @php
        $BvarCount = count($varieties);
        $vvv = 0;
    @endphp
    @for($v = 0; $v < $varCount; $v++)
        <div class=" bg-warning " style="width: 80%">
            @for($g = 0; $g < $BvarCount; $g++)
                @if($varieties[$g]->variety == $variety_id[$v])
                    @php
                        $vvv += 1;
                    @endphp
                    <script>

                        let mmmmm{{$vvv}} = document.querySelector('.mmmmm{{$vvv}}');
                        let kkkkk{{$vvv}} = document.querySelector('.kkkkk{{$vvv}}');
                        let nnnnn{{$vvv}} = document.querySelector('.nnnnn{{$vvv}}');
                        let paeen{{$vvv}} = document.querySelector('.paeen{{$vvv}}');
                        let borderSellect{{$vvv}} = document.querySelector('.borderSellect{{$vvv}}');
                        let variety{{$varieties[$g]->variety}} = document.querySelector('.kala-buy-box-name-varieties{{$varieties[$g]->variety}}');
                        let topFee{{$varieties[$g]->variety}} = document.querySelector('.kala-buy-box-name-topFee{{$varieties[$g]->variety}}');
                        let topFee2{{$varieties[$g]->variety}} = document.querySelector('.kala-buy-box-name-topFee2{{$varieties[$g]->variety}}');
                        let downFee{{$varieties[$g]->variety}} = document.querySelectorAll('.kala-buy-box-name-downFee{{$varieties[$g]->variety}}');
                        let downFee2{{$varieties[$g]->variety}} = document.querySelectorAll('.kala-buy-box-name-downFee2{{$varieties[$g]->variety}}');
                        variety{{$varieties[$g]->variety}}.addEventListener('click' , function (){




                            for (j = 0; j < mmmmm1.childNodes.length; j++){
                                if (j % 2 == 1){
                                    mmmmm1.childNodes[j].style.display = 'none';
                                }

                            }

                            for (j = 0; j < kkkkk1.childNodes.length; j++){
                                if (j % 2 == 1){
                                    kkkkk1.childNodes[j].style.display = 'none';
                                }

                            }

                            for (j = 0; j < nnnnn1.childNodes.length; j++){
                                if (j % 2 == 1){
                                    nnnnn1.childNodes[j].style.display = 'none';
                                }
                            }

                            for (j = 0; j < paeen1.childNodes.length; j++){
                                if (j % 2 == 1){
                                    paeen1.childNodes[j].style.display = 'none';
                                }

                            }

                            for(i = 0; i < downFee{{$varieties[$g]->variety}}.length; i++){
                                downFee{{$varieties[$g]->variety}}[i].style.display = 'flex';
                            }

                            for(i = 0; i < downFee2{{$varieties[$g]->variety}}.length; i++){
                                downFee2{{$varieties[$g]->variety}}[i].style.display = 'flex';
                            }

                            topFee{{$varieties[$g]->variety}}.style.display = 'block';
                            topFee2{{$varieties[$g]->variety}}.style.display = 'block';



                            for ( i = 0 ; i < borderSellect1.childNodes.length ; i++){
                                if (i % 2 === 1) {
                                    borderSellect1.childNodes[i].style.borderColor = 'white';
                                }
                            }
                            variety{{$varieties[$g]->variety}}.style.borderColor = '#3dd5f3';

                        })


                        setInterval(function (){
                        } , 10)

                        {{--console.log(variety{{$varieties[$g]->variety}}.scrollWidth)--}}

                    </script>
                    @break;
                @endif
            @endfor
        </div>
    @endfor









    @endif

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

@vite(['resources/js/view.js'])



