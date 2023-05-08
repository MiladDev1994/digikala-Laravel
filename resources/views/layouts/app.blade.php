<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">



    @vite(['resources/css/bootstrap.rtl.min.css', 'resources/css/app.css','resources/css/font.css'])


</head>
<body dir="rtl">


<div class=" kala-header-search-box-facke  "></div>
<div class=" kala-header-search-box-fackemeno "></div>




<div class="kala-header-menu-togle-list-0 shadow">


    {{--sratr mege menu--}}
    <div class="kala-header-menu-togle-list-0-background">
        @foreach($categoriesId as $categoryId)

            <div class=" mt-3  px-5 kala-header-menu-togle-list-menu-item-all " style="cursor: default">
                <a href="{{route('product.category.index' ,$categoryId->id )}}" class="d-flex align-items-center justify-content-start px-3" style="height: 40px ; color: #5c636a ; text-decoration: none">همه محصولات {{$categoryId->name}}</a>
                @if($categoryId->child)
                    @foreach($categoryId->child as $categoryId)
                        <div class=" d-flex align-items-start justify-content-start flex-column mt-3 " style="width: 200px ; float: right">
                            <a href="{{route('product.category.index' , $categoryId->id)}}" class=" h-100 px-2 d-flex align-items-center justify-content-start" style="border-right: 2px solid red ; color: #6a6a6a ; height: 18px!important ; text-decoration: none ">
                                <strong>
                                    {{$categoryId->name}}
                                </strong>
                            </a>
                            @if($categoryId->child)
                                @foreach($categoryId->child as $categoryId)
                                    <a href="{{route('product.category.index' , $categoryId->id)}}"  class=" d-flex align-items-start justify-content-start  flex-column  px-2 w-100 mt-2" style="color: #7f7f7f ; text-decoration: none ">
                                        {{$categoryId->name}}
                                        @foreach($categoryId->child as $categoryId)
                                            <a href="{{route('product.category.index' , $categoryId->id)}}"   class=" d-flex align-items-center justify-content-center flex-column px-2" style="color: #7f7f7f ; text-decoration: none ">
                                                {{$categoryId->name}}
                                                @foreach($categoryId->child as $categoryId)
                                                    <a href="{{route('product.category.index' , $categoryId->id)}}"   class=" d-flex align-items-center justify-content-center flex-column px-2" style="color: #7f7f7f ; text-decoration: none ">
                                                        {{$categoryId->name}}
                                                        @foreach($categoryId->child as $categoryId)
                                                            <a href="{{route('product.category.index' , $categoryId->id)}}"   class=" d-flex align-items-center justify-content-center flex-column px-2" style="color: #7f7f7f ; text-decoration: none ">
                                                                {{$categoryId->name}}
                                                                @foreach($categoryId->child as $categoryId)
                                                                    <a href="{{route('product.category.index' , $categoryId->id)}}"   class=" d-flex align-items-center justify-content-center flex-column px-2" style="color: #7f7f7f ; text-decoration: none ">
                                                                        {{$categoryId->name}}
                                                                    </a>
                                                                @endforeach
                                                            </a>
                                                        @endforeach
                                                    </a>
                                                @endforeach
                                            </a>
                                        @endforeach
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>


    <div class="kala-header-menu-togle-list-0-box bg-white">
        @foreach($categories as $category)
            <style>
                .head{{$category->id}}{
                    height: 100%;
                    background-color: transparent;
                    position: absolute;
                    display: none;
                    right: 200px;
                    top: -15px;
                    overflow: scroll;
                    scrollbar-width:thin;
                    scrollbar-color: #e3e3e3 transparent;
                }
                .head{{$category->id}}::-webkit-scrollbar{
                    width: 0;
                    height: 0;
                }


                .menu{{$category->id}}:hover .head{{$category->id}}{
                    display: block;
                }

            </style>
            @if($category->level == 1)
                <div href="#" class="kala-header-menu-togle-list-menu-box px-2 menu{{$category->id}}">
                    <div style="width: 20px ; height: 100%" class="d-flex align-items-center justify-content-center">
                        @php
                            echo file_get_contents('images/'.$category->logo);
                        @endphp
                    </div>

                    <div class="" style="width: 185px ; height: 100%">
                        <a href="{{route('product.category.index' ,$category->id )}}" class="w-100 h-100 d-flex align-items-center justify-content-start  kala-header-menu-togle-list-menu-item text-end ms-2 position-relative" style=" text-decoration: none; color: #5c636a"><strong style="font-size: 13px ; white-space: nowrap">{{$category->name}}</strong></a>
                    </div>


                    <div class="head{{$category->id}} mt-3 px-5 kala-header-menu-togle-list-menu-item-all bg-white " style="cursor: default">
                        <a href="{{route('product.category.index' ,$category->id )}}" class="d-flex align-items-center justify-content-start px-3" style="height: 40px ; color: #5c636a ; text-decoration: none">همه محصولات {{$category->name}}</a>
                        @if($category->child)
                            @foreach($category->child as $category)
                                <div class="head d-flex align-items-start justify-content-start flex-column mt-3 " style="width: 200px ; float: right">
                                    <div class=" h-100 px-2 d-flex align-items-center justify-content-start " style="border-right: 2px solid red ; color: #6a6a6a ; height: 18px!important">
                                        <style>
                                            .kala-textColor:hover{
                                                color: red!important;
                                                transition: 0.3s;
                                            }
                                        </style>
                                        <strong class="">
                                            <a href="{{route('product.category.index' , $category->id)}}" class="{{$category->level == 2 ? 'kala-textColor' : ''}} " style="cursor: pointer ; text-decoration: none ; color: #5c636a">{{$category->name}}</a>
                                        </strong>
                                    </div>
                                    @if($category->child)
                                        @foreach($category->child as $category)
                                            <div class=" head d-flex align-items-start justify-content-start  flex-column  px-2 w-100 mt-2" style="color: #7f7f7f">

                                                <a href="{{route('product.category.index' , $category->id)}}" class="{{$category->level == 3 ? 'kala-textColor' : ''}}" style="cursor: pointer ; text-decoration: none ; color: #7f7f7f">{{$category->name}}</a>
                                                @foreach($category->child as $category)
                                                    <div class="head d-flex align-items-center justify-content-center flex-column">
                                                        <a href="{{route('product.category.index' , $category->id)}}" class="{{$category->level == 4 ? 'kala-textColor' : ''}}" style="cursor: pointer ; text-decoration: none ; color: #7f7f7f">{{$category->name}}</a>
                                                        @foreach($category->child as $category)
                                                            <div class="head d-flex align-items-center justify-content-center flex-column">
                                                                <a href="{{route('product.category.index' , $category->id)}}" class="{{$category->level == 5 ? 'kala-textColor' : ''}}" style="cursor: pointer ; text-decoration: none ; color: #7f7f7f">{{$category->name}}</a>
                                                                @foreach($category->child as $category)
                                                                    <div class="head d-flex align-items-center justify-content-center flex-column">
                                                                        <a href="{{route('product.category.index' , $category->id)}}" class="{{$category->level == 6 ? 'kala-textColor' : ''}}" style="cursor: pointer ; text-decoration: none ; color: #7f7f7f">{{$category->name}}</a>
                                                                        @foreach($category->child as $category)
                                                                            <div class="head d-flex align-items-center justify-content-center flex-column">
                                                                                <a href="{{route('product.category.index' , $category->id)}}" class="{{$category->level == 7 ? 'kala-textColor' : ''}}" style="cursor: pointer ; text-decoration: none ; color: #7f7f7f">{{$category->name}}</a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
        <div></div>
    </div>
    {{--    end mega menu--}}




    {{--    sratr small menu--}}
    <div class="kala-header-listSmall-box mb-5">


        <div class="w-100 d-flex align-items-center justify-content-start" style="height: 65px  ;border-bottom: 1px solid rgba(0,0,0,0.07)">
            @php
                echo file_get_contents('image/logo.svg');
            @endphp
        </div>


        <div class="kala-header-listSmall-box-listBox w-100 d-flex align-item-center justify-content-start flex-column" style="height: 250px;border-bottom: 1px solid rgba(0,0,0,0.07)">
            <a href="{{route('product.category.index' , $categoriesHomeView[3]->id)}}" class="w-100 mt-4 d-flex align-items-center justify-content-start" style="font-size: 15px ; text-decoration: none ; color: #434343">
                <i class="bi-gem me-3" style="font-size: 20px ; color: #878787"></i>
                <strong>
                    سوپرمارکت
                </strong>

            </a>
            <a href="{{route('product.moreSell.index')}}" class="w-100 mt-4 d-flex align-items-center justify-content-start" style="font-size: 15px ; text-decoration: none ; color: #434343">
                <i class="bi-gem me-3" style="font-size: 20px ; color: #878787"></i>
                <strong>
                    پرفروش‌ترین‌ها
                </strong>
            </a>
            <a class="w-100 mt-4 d-flex align-items-center justify-content-start" style="font-size: 15px ; text-decoration: none ; color: #434343">
                <i class="bi-gem me-3" style="font-size: 20px ; color: #878787"></i>
                <strong>
                    تخفیف‌ها و پیشنهاد‌ها
                </strong>
            </a>
            <a href="{{route('product.special.index')}}" class="w-100 mt-4 d-flex align-items-center justify-content-start" style="font-size: 15px ; text-decoration: none ; color: #434343">
                <i class="bi-gem me-3" style="font-size: 20px ; color: #878787"></i>
                <strong>
                    شگفتانگیز‌ها
                </strong>
            </a>
            <a class="w-100 mt-4 d-flex align-items-center justify-content-start" style="font-size: 15px ; text-decoration: none ; color: #434343">
                <i class="bi-house me-3" style="font-size: 20px ; color: #878787"></i>
                <strong>
                    در دیجی‌کالا بفروشید!
                </strong>
            </a>
        </div>



        <div class="w-100" style="font-size: 20px"> دسته‌بندی‌کالاها </div>
        <div class="w-100" style="">


            @foreach($categories as $category)
                <div style="font-size: 15px ; color: #666666 " class=" w-100 bg-white  accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                    <strong> {{$category->name}} </strong>
                </div>
                <div style="background-color: #f1f1f1" class="collapse px-3" id="collapseExample{{$category->id}}">
                    <a href="{{route('product.category.index' , $category->id)}}" class="card card-body bg-transparent d-flex align-items-start justify-content-center" style="border: none ; color: #717171 ; text-decoration: none ; height: 18px"> همه موارد این دسته > </a>
                @if($category->child !='[]')

                    @foreach($category->child as $category)
                        <a href="{{route('product.category.index' , $category->id)}}" style=" height: 30px ; display: flex ; align-items: center ; justify-content: start ; padding-right:18px; text-decoration: none" class=" {{$category->child =='[]' ? '' :'accordion-button collapsed' }} bg-transparent mt-2 w-100  text-dark"  data-bs-toggle="{{$category->child =='[]' ? '' :'collapse' }}" data-bs-target="#collapseExample{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                            {{$category->name}}
                        </a>
                        @if($category->child !='[]')
                            <div class="collapse px-3  bg-transparent" id="collapseExample{{$category->id}}">
                                <a href="{{route('product.category.index' , $category->id)}}" class="card card-body d-flex align-items-start justify-content-center  bg-transparent" style="border: none ; color: #717171 ; text-decoration: none; height: 15px"> همه موارد این دسته > </a>
                                @foreach($category->child as $category)
                                    <a href="{{route('product.category.index' , $category->id)}}" style=" height: 30px ; display: flex ; align-items: center ; justify-content: start ; padding-right:16px; text-decoration: none" class=" mt-2 {{$category->child =='[]' ? '' :'accordion-button collapsed' }}  w-100 bg-white text-dark  bg-transparent" type="button" data-bs-toggle="{{$category->child =='[]' ? '' :'collapse' }}" data-bs-target="#collapseExample{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                                        {{$category->name}}
                                    </a>
                                    @if($category->child !='[]')
                                        <div class="collapse px-3  bg-transparent" id="collapseExample{{$category->id}}">
                                            <a href="{{route('product.category.index' , $category->id)}}" class="  bg-transparent card-body d-flex align-items-center justify-content-start" style="border: none ; color: #717171 ; text-decoration: none; height: 15px"> همه موارد این دسته > </a>
                                            @foreach($category->child as $category)
                                                <a href="{{route('product.category.index' , $category->id)}}" style=" height: 30px ; display: flex ; align-items: center ; justify-content: start ; padding-right:18px; text-decoration: none" class=" mt-2 {{$category->child =='[]' ? '' :'accordion-button collapsed' }}  w-100  bg-transparent bg-white text-dark" type="button" data-bs-toggle="{{$category->child =='[]' ? '' :'collapse' }}" data-bs-target="#collapseExample{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                    {{$category->name}}
                                                </a>
                                                @if($category->child !='[]')
                                                    <div class="collapse px-3  bg-transparent" id="collapseExample{{$category->id}}">
                                                        <a href="{{route('product.category.index' , $category->id)}}" class="  bg-transparentcard card-body d-flex align-items-center justify-content-start" style="border: none ; color: #717171 ; text-decoration: none; height: 15px"> همه موارد این دسته > </a>
                                                        @foreach($category->child as $category)
                                                            <a href="{{route('product.category.index' , $category->id)}}" style=" height: 30px ; display: flex ; align-items: center ; justify-content: start ; padding-right:20px; text-decoration: none" class=" mt-2 {{$category->child =='[]' ? '' :'accordion-button collapsed' }}  w-100  bg-transparent bg-white text-dark" type="button" data-bs-toggle="{{$category->child =='[]' ? '' :'collapse' }}" data-bs-target="#collapseExample{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                                {{$category->name}}
                                                            </a>
                                                            @if($category->child !='[]')
                                                                <div class="collapse px-3  bg-transparent" id="collapseExample{{$category->id}}">
                                                                    <a href="{{route('product.category.index' , $category->id)}}" class="  bg-transparentcard card-body d-flex align-items-center justify-content-start" style="border: none ; color: #717171 ; text-decoration: none; height: 15px"> همه موارد این دسته > </a>
                                                                    @foreach($category->child as $category)
                                                                        <a href="{{route('product.category.index' , $category->id)}}" style=" height: 30px ; display: flex ; align-items: center ; justify-content: start ; padding-right:20px; text-decoration: none" class=" mt-2 {{$category->child =='[]' ? '' :'accordion-button collapsed' }}  w-100  bg-transparent bg-white text-dark" type="button" data-bs-toggle="{{$category->child =='[]' ? '' :'collapse' }}" data-bs-target="#collapseExample{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                                            {{$category->name}}
                                                                        </a>
                                                                        @if($category->child !='[]')
                                                                            <div class="collapse px-3  bg-transparent" id="collapseExample{{$category->id}}">
                                                                                <a href="{{route('product.category.index' , $category->id)}}" class="  bg-transparentcard card-body d-flex align-items-center justify-content-start" style="border: none ; color: #717171 ; text-decoration: none; height: 15px"> همه موارد این دسته > </a>
                                                                                @foreach($category->child as $category)
                                                                                    <a href="{{route('product.category.index' , $category->id)}}" style=" height: 30px ; display: flex ; align-items: center ; justify-content: start ; padding-right:20px; text-decoration: none" class=" mt-2 {{$category->child =='[]' ? '' :'accordion-button collapsed' }}  w-100  bg-transparent bg-white text-dark" type="button" data-bs-toggle="{{$category->child =='[]' ? '' :'collapse' }}" data-bs-target="#collapseExample{{$category->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                                                        {{$category->name}}
                                                                                    </a>
                                                                                    <div class="  bg-transparent collapse px-3" id="collapseExample{{$category->id}}">
                                                                                        <a href="{{route('product.category.index' , $category->id)}}" class=" bg-transparent card card-body d-flex align-items-center justify-content-start" style="border: none ; color: #717171 ; text-decoration: none; height: 15px"> همه موارد این دسته > </a>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                @endif
                </div>
            @endforeach
        </div>
    </div>
</div>





@if(auth()->check() && auth()->user()->role == 'developer')
    <div class="kala-header-admin shadow">
        <a class="text-dark text-start d-flex align-items-center justify-content-center px-2 h-100" style="text-decoration: none ; font-weight: 600" href="{{route('admin.dashboard')}}">{{auth()->user()->name}}</a>
    </div>

@endif




<div>
    <div class="kala-header-box " >



        <div class="kala-header-meno-box" id="top">
            <a href="{{route('product.brands.index' , $homeView1[8]->brand_id)}}" class="kala-header-box-banner bg-white" style="background-image:url('{{url("images/".$homeView1[8]->image)}}')  ; background-size: cover ; background-position: center"></a>

            <div class="kala-header-box-miniMuno">




                <div class="   menuB" style="font-size: 22px ; cursor: pointer">
                    <i class="bi-list h4"></i>
                </div>
                <div class="kala-header-box-miniMuno-main-logo">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{url('image/logo.svg')}}">
                    </a>
                </div>
                <i class="bi-question-diamond" style="font-size: 22px ; cursor: pointer" ></i>
            </div>


            <div class="w-100 bg-white">
            <div class="kala-header-box-meno">

                <div class="kala-header-box-meno-main">
                    <div class="kala-header-box-meno-main-logo">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{url('image/logo.svg')}}">
                        </a>
                    </div>

                    <div class="kala-header-box-meno-main-search">

                        <div class="kala-header-box-meno-main-search-into" >
                            <a class="kal-searchLogo  d-flex align-items-center justify-content-center" style="height: 100% ; width: 45px ; cursor: pointer">
                                <ion-icon name="search"  style="font-size: 22px ; color: #999999"></ion-icon>
                            </a>
                            <div class="kal-searchLogo  d-flex align-items-center justify-content-start" style="height: 100% ; width: 100%">
                                <input type="text" placeholder="جستجو" class="w-25" style="height: 40px ; background-color:transparent ; border: none ; outline: none" >
                            </div>

                            <div class="kala-header-searcher  border  border-1 shadow  "  >
                                <a class="kal-searchLogo  d-flex align-items-center justify-content-center" style="height: 42px ; width: 45px ; cursor: pointer">
                                    <ion-icon name="search"  style="font-size: 22px ; color: #616161"></ion-icon>
                                </a>
                                <div class="kal-searchLogo  d-flex align-items-center justify-content-start kala-search-into " style="height: 42px ; width: 85%">
                                    <input type="text" placeholder="جستجو" class="w-100 " style="height: 40px ; background-color:transparent ; border: none ; outline: none" >
                                </div>
                            </div>
                        </div>

                        <a href="#" class="kala-CloseBtn">
                            <ion-icon  class="icon" name="close" style="font-size: 25px"></ion-icon>
                        </a>
                    </div>

                    <div class="kala-header-box-meno-main-login  align-items-center justify-content-center">

                        <div class="kala-header-box-meno-main-login-box d-flex align-items-center justify-content-end ">

                            @guest
                                <div class="kala-header-box-meno-main-login-box-main border border-1 px-2">
                                    @if (Route::has('login'))
                                        <i class="bi-box-arrow-left me-2" style="font-size: 25px ; color: #535353"></i>
                                        <a class="nav-link  p-0 text-secondary"  style="width: 35px ; font-size: 15px" href="{{ route('login'  , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])]) }}"><strong>{{ __('ورود') }}</strong></a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a class="nav-link text-secondary p-0 px-1 border-start border-2 border-secondary pe-2" href="{{ route('register'  , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])]) }}" style="font-size: 15px ; width: 60px"><strong>{{ __('ثبت نام') }}</strong></a>
                                    @endif
                                </div>
                            @else
                                <div class="kala-header-box-meno-main-login-box-main" >
                                    <div class="d-flex align-items-center justify-content-center " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="bi-person" style="font-size: 30px ; color: #535353"></i>
                                        <a  class="nav-link dropdown-toggle  d-flex align-items-center justify-content-center text-secondary" style="height: 30px"  ></a>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end shadow mt-2 kala-header-box-meno-main-login-box-drop" aria-labelledby="navbarDropdown">
                                        <div class="containe px-3">
                                            <div class="row">
                                                <div class="col-12 py-1 d-flex align align-items-center justify-content-center border-bottom">
                                                    <a class="kala-header-box-meno-main-login-box-drop-in dropdown-item d-flex align align-items-center justify-content-between text-secondary" href="{{ route('user.panel.order') }}" >
                                                        <img src="{{url('image/df110dcf.svg')}}">{{ auth()->user()->name }}
                                                        <i class="bi-chevron-left" style="font-size: 15px ; color: #535353"></i>
                                                    </a>
                                                </div>
                                                <div class="col-12  py-1  d-flex align align-items-center justify-content-center border-bottom">
                                                    <a class="kala-header-box-meno-main-login-box-drop-in dropdown-item d-flex align align-items-center justify-content-start  text-secondary" href="{{ route('user.panel.order') }}">
                                                        <i class="bi-bag me-2" style="font-size: 20px ; color: #535353"></i>{{ __('سفارشات')  }}
                                                    </a>
                                                </div>
                                                <div class="col-12  py-1 d-flex align align-items-center justify-content-center border-bottom">
                                                    <a class="kala-header-box-meno-main-login-box-drop-in dropdown-item d-flex align align-items-center justify-content-start text-secondary" href="{{ route('user.panel.favorite') }}">
                                                        <i class="bi-heart me-2" style="font-size: 17px ; color: #535353"></i>{{ __('علاقه مندی')  }}
                                                    </a>
                                                </div>
                                                <div class="col-12 py-1 d-flex align align-items-center justify-content-center">
                                                    <a class= "kala-header-box-meno-main-login-box-drop-in dropdown-item d-flex align align-items-center justify-content-start text-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        <i class="bi-box-arrow-right me-2" style="font-size: 20px ; color: #535353"></i>{{ __('خروج از حساب کاربری')  }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @endguest
                        </div>
                        <div class="kala-header-box-meno-main-basket-box d-flex align-items-center justify-content-center " >
                            @auth()
                                <a href="{{route('basket.index')}}" class="kala-header-box-meno-main-basket-box-into">
                                    <i class="bi-bag" style="font-size: 25px ; color: #535353"></i>
                                    <div class="kala-header-box-meno-main-basket-box-num bg-danger position-absolute  align-items-center justify-content-center text-light basketNumberview" style="display: {{count($basketItem) == 0 ? 'none' : 'flex'}}" >
                                        @if(count($basketItem) == 0)
                                            @php
                                                $basketNumber = '';
                                            @endphp
                                        @else
                                            @php
                                                $basketNumber = 0;
                                            @endphp
                                            @foreach($basketItem as $item)
                                                @php
                                                    $basketNumber += $item['number'];
                                                @endphp

                                            @endforeach
                                        @endif
                                        {{$basketNumber}}
                                    </div>
                                </a>
                            @else
                                <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="kala-header-box-meno-main-basket-box-into">
                                    <i class="bi-bag" style="font-size: 25px ; color: #535353"></i>
                                </a>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>




    <div class="kala-header-menu-togle">
        <div class=" kala-header-menu-togle-box" >
        <a class="kala-header-menu-togle-list text-color d-flex align-items-center justify-content-between px-4">
            <i class="bi-list" style="font-size: 20px ; color: #535353"></i>
            <strong  style="font-size: 15px!important" >دسته‌بندی‌کالاها</strong>
        </a>

        <a href="{{route('product.category.index' , 4)}}" class="kala-header-menu-togle-sopermarket text-color  d-flex align-items-center justify-content-start"  style="font-size: 14px!important" >
            <i class="bi-gem me-1" style="font-size: 16px ; color: #535353"></i>
            سوپرمارکت
        </a>


        <a href="{{route('product.moreSell.index')}}"  class="kala-header-menu-togle-much text-color d-flex align-items-center justify-content-start"  style="font-size: 14px!important">
            <i class="bi-gem me-1" style="font-size: 16px ; color: #535353"></i>
            پرفروش‌ترین‌ها
        </a>
        <a class="kala-header-menu-togle-off text-color d-flex align-items-center justify-content-start"  style="font-size: 14px!important">
            <i class="bi-gem me-1" style="font-size: 16px ; color: #535353"></i>
            تخفیف‌ها و پیشنهاد‌ها
        </a>
        <a href="{{route('product.special.index')}}" class="kala-header-menu-togle-super text-color d-flex align-items-center justify-content-start"  style="font-size: 14px!important">
            <i class="bi-gem me-1" style="font-size: 16px ; color: #535353"></i>
            شگفتانگیز‌ها
        </a>
            @if(auth()->check() && auth()->user()->isSeller > 0)
                <a href="{{route('seller.dashboard')}}" class="kala-header-menu-togle-seller text-color d-flex align-items-center justify-content-start px-4 "  style="font-size: 14px!important">پنل فروشندگی </a>
            @else
                <a class="kala-header-menu-togle-seller text-color d-flex align-items-center justify-content-start px-2"  style="font-size: 14px!important">در دیجی‌کالا بفروشید!</a>
            @endif

        <div class="kala-header-menu-togle-under">
            <div class="kala-header-menu-togle-under-into"></div>
        </div>

        <a class="kala-header-menu-togle-addres text-color d-flex align-items-center justify-content-start"  style="font-size: 12px!important">
            <i class="bi-geo-alt me-1" style="font-size: 17px ; color: #535353"></i>
            لطفا شهر خود را انتخاب کنید
        </a>
        </div>
    </div>



<div class=" kala-upSlider  w-100  " style="height: 147px"></div>



<div class="py-4 bg-white mainBox" >
    @yield('main')
</div>


<div class="footer-phone">
    <a href="{{route('home')}}" class="footer-phone-icon kala-footer-icon-1">
        <ion-icon  class="icon" name="home" style="font-size: 25px"></ion-icon>
        خانه
    </a>
    <div  class="footer-phone-icon kala-footer-icon-2">
        <ion-icon class="icon" name="car" style="font-size: 25px"></ion-icon>
        دسته بندی ها
    </div>
    @auth()
    <a href="{{route('basket.index')}}" class="footer-phone-icon kala-footer-icon-3">
        <ion-icon class="icon" name="basket" style="font-size: 25px"></ion-icon>
        سبد خرید
    </a>
    @else
        <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="footer-phone-icon kala-footer-icon-3">
            <ion-icon class="icon" name="basket" style="font-size: 25px"></ion-icon>
            سبد خرید
        </a>
    @endauth
    <div class="footer-phone-icon kala-footer-icon-4">
        <ion-icon class="icon" name="flower" style="font-size: 25px"></ion-icon>
        مگنت
    </div>
    @auth()
        <a href="{{route('user.panel.order')}}" class="footer-phone-icon kala-footer-icon-5">
            <ion-icon class="icon" name="person" style="font-size: 25px"></ion-icon>
            دیجی کالای من
        </a>
    @else
        <a href="{{route('login' , [session(['redirect'=>\Illuminate\Support\Facades\URL::current()])])}}" class="footer-phone-icon kala-footer-icon-5">
            <ion-icon class="icon" name="person" style="font-size: 25px"></ion-icon>
            دیجی کالای من
        </a>
    @endauth

</div>




<div class="w-100 border-top kala-footer-main mb-0" style="background-color: #ededed ; color: #808080">
    <div class="kala-footer py-3 m-auto px-3">
        <div class="d-flex align-items-center justify-content-center">
            <div class="h-100 d-flex align-items-center justify-content-around flex-column py-3" style="width: 200px">
                @php
                    echo file_get_contents('image/logo.svg');
                @endphp
                تلفن پشتیبانی ۶۱۹۳۰۰۰۰ - ۰۲۱
            </div>

            <div class="kala-goTopBtn2 h-100  py-3" style="">
                <a class="btn btn-light shadow-sm kala-footer-up1 rounded-pill" style="color: #808080">
                    بازگشت به بالا
                    <i class="bi-arrow-up"></i>
                </a>
            </div>
        </div>
        <div class="h-100 d-flex align-items-center justify-content-center text-center py-3 kala-footer-text px-3" style="">
            برای استفاده از مطالب دیجی‌کالا، داشتن «هدف غیرتجاری» و ذکر «منبع» کافیست. تمام حقوق اين وب‌سايت نیز برای شرکت نوآوران فن آوازه (فروشگاه آنلاین دیجی‌کالا) است.
        </div>
        <div class="kala-goTopBtn1 py-3" style="width: 200px">
            <a class="btn btn-light shadow-sm kala-footer-up2 rounded-pill" style="color: #808080 ; white-space: nowrap">
                بازگشت به بالا
                <i class="bi-arrow-up"></i>
            </a>
        </div>
    </div>
</div>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@vite(['resources/js/app.js'])
<script>
    let body = document.querySelector('body');
    let bodyWidth = body.scrollWidth;
</script>
</body>
</html>


