@extends('layouts.app')

@vite(['resources/css/products.css'])
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
    .pagination{
        display: flex!important;
        align-items: center!important;
        justify-content: center!important;
    }
    .page-link{
        background-color: #00c6da;
        border-radius: 50%;
        margin: 7px;
        font-size: 15px;
        color: black!important;
    }
</style>
@section('main')


<div class="w-100 kala-products-main" style="">
    <div class="kala-products-box m-auto">
{{--        page's Name--}}
        <div class="mt-3 px-4 overflow-hidden" style="font-size: 15px ; color: #838383 ; height: 30px ; white-space: nowrap!important">
            <div class=" h-100" style="width: 1200px">
                @if(strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                <div class=""style="float: right">
                    {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                </div>
                <div style="direction: ltr ; float: right" class=" text-end">
                    <div style="float: left">{{$category->name}} {{$category->parent != '[]' ? '/' : ''}}</div>
                    @if($category->parent)
                        @foreach($category->parent as $item)
                            <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                            @if($item->parent)
                                @foreach($item->parent as $item)
                                    <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                    @if($item->parent)
                                        @foreach($item->parent as $item)
                                            <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                            @if($item->parent)
                                                @foreach($item->parent as $item)
                                                    <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                                    @if($item->parent)
                                                        @foreach($item->parent as $item)
                                                            <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                       @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </div>
            @endif
                @if(strstr(request()->path() , 'category') && strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end">
                        <div style="float: left">{{$category->name}} {{$category->parent != '[]' ? '/' : ''}}</div>
                        @if($category->parent)
                            @foreach($category->parent as $item)
                                <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                @if($item->parent)
                                    @foreach($item->parent as $item)
                                        <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                        @if($item->parent)
                                            @foreach($item->parent as $item)
                                                <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                                @if($item->parent)
                                                    @foreach($item->parent as $item)
                                                        <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                                        @if($item->parent)
                                                            @foreach($item->parent as $item)
                                                                <div style="float: left">{{$item->name}} {{$item->parent != '[]' ? '/' : ''}}</div>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endif
                @if(strstr(request()->path() , 'brands') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> {{$brand->name}} </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'brands') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> {{$brand->name}} </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> پرفروش‌ها </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> پرفروش‌ها </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> پرفروش‌ها </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> پرفروش‌ها </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> شگفت انگیز‌ها </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> شگفت انگیز‌ها </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> شگفت انگیز‌ها </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class=""style="float: right">
                        {{'فروشگاه اینترنتی دیجی‌کالا'}} /
                    </div>
                    <div style="direction: ltr ; float: right" class=" text-end ms-1">
                        <div style="float: left"> شگفت انگیز‌ها </div>
                    </div>
                @endif
            </div>
        </div>

{{--        filter-Big-right--}}
        <div class="kala-products-box-right py-2 " style="width: 280px ; float: right">
            <div class="position-sticky border" style="width: 90% ; height: 620px ; top: 200px ; right: 15px ; border-radius: 15px">
                <div class="w-100 py-3 px-3 border-bottom h4 text-center" style="">فیلترها</div>
                @if(strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                    <div class="w-100 mt-1 p-1 text-center  h4" style="">برند‌ها</div>
                    <div class=" border-bottom" style="height: 240px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                        @foreach($brands as $value)
                            <a href="{{route('product.category.brand.index' ,['category'=> $category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="btn bg-light border mt-1"> {{$value->name}} </a>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                        <div class="">
                            <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <div class="" style="color: #808080">از</div>
                                <section class="d-flex">
                                    <div class="max-value h4">5,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                            <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <div class="" style="color: #808080">تا</div>
                                <section class="d-flex">
                                    <div class="min-value h4">90,000,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                        </div>
                        <form class=" mt-4" method="get" action="{{route('product.category.index' , $category->id)}}" style="width: 85% ; margin-right: 7%">
                            <div class="d-flex align-items-center justify-content-center">
                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                            </div>
                            <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>

                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                            </div>
                        </form>
                    </div>
                @endif
                @if(strstr(request()->path() , 'category') && strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                    <div class="w-100 mt-1 p-1 text-center  h4" style="">برند‌ها</div>
                    <div class=" border-bottom" style="height: 240px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                        @foreach($brands as $value)
                            <a href="{{route('product.category.brand.index' ,['category'=> $category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="{{$value->id == $brand->id ? 'bg-secondary' : 'bg-light'}} btn  border mt-1 "> {{$value->name}} </a>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                        <div class="">
                            <div class=" h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <p class="" style="right: 10px ; top: 30% ; color: #808080">از</p>
                                <section class="d-flex">
                                    <div class="max-value h4">5,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                            <div class=" h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <p class="" style="right: 10px ; top: 30% ; color: #808080">تا</p>
                                <section class="d-flex">
                                    <div class="min-value h4">90,000,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                        </div>

                        <form class=" mt-3" method="get" action="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id])}}" style="width: 85% ; margin-right: 7%">
                            <div class="d-flex align-items-center justify-content-center">
                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount"   style="border:0; font-weight:bold;">
                            </div>
                            <div id="" class="bg-light slider-range"></div>
                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                <button class="btn btn-light "><i class="bi-check-lg"></i></button>
                            </div>
                        </form>
                    </div>
                @endif
                @if(strstr(request()->path() , 'brands') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                    <div class="w-100 mt-1 p-1 text-center  h4" style="">دسته‌بندی‌ها</div>
                    <div class=" position-relative border-bottom" style="height: 240px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                        @foreach($categoryList as $value)
                            <a href="{{route('product.brands.category.index' ,['brand'=> $brand->id , 'category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                        <div class="">
                            <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <div class="" style="color: #808080">از</div>
                                <section class="d-flex">
                                    <div class="max-value h4">5,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                            <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <div class="" style="color: #808080">تا</div>
                                <section class="d-flex">
                                    <div class="min-value h4">90,000,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                        </div>
                        <form class=" mt-4" method="get" action="{{route('product.brands.index' , $brand->id)}}" style="width: 85% ; margin-right: 7%">
                            <div class="d-flex align-items-center justify-content-center">
                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                            </div>
                            <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                            </div>
                        </form>
                    </div>
                @endif
                @if(strstr(request()->path() , 'brands') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                    <div class="w-100 mt-1 p-1 text-center  h4" style="">دسته‌بندی‌ها</div>
                    <div class=" position-relative border-bottom" style="height: 240px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                        @foreach($categoryList as $value)
                            <a href="{{route('product.brands.category.index' ,['brand'=> $brand->id , 'category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                        <div class="">
                            <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <div class="" style="color: #808080">از</div>
                                <section class="d-flex">
                                    <div class="max-value h4">5,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                            <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                <div class="" style="color: #808080">تا</div>
                                <section class="d-flex">
                                    <div class="min-value h4">90,000,000</div>
                                    @php
                                        echo file_get_contents('images/toman.svg');
                                    @endphp
                                </section>
                            </div>
                        </div>
                        <form class=" mt-4" method="get" action="{{route('product.brands.category.index' , [$brand->id , $category->id])}}" style="width: 85% ; margin-right: 7%">
                            <div class="d-flex align-items-center justify-content-center">
                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                            </div>
                            <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                            </div>
                        </form>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                                <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <h5>برندها</h5>
                                </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)

                                    <a href="{{route('product.moreSell.brand.index' ,['brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="btn bg-light border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.index')}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>برندها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)
                                    <a href="{{route('product.moreSell.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="btn bg-light border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.category.index' , $category->id)}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>برندها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)
                                    <a href="{{route('product.moreSell.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="{{$brand->id == $value->id  ? 'bg-secondary' : 'bg-light'}} btn border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.categorybrand.index' , [$category->id , $brand->id])}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>برندها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)
                                    <a href="{{route('product.moreSell.brand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="{{$brand->id == $value->id  ? 'bg-secondary' : 'bg-light'}} btn border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.brand.index' , $brand->id)}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>برندها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)
                                    <a href="{{route('product.special.brand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="btn bg-light border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.index')}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>برندها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)
                                    <a href="{{route('product.special.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="btn bg-light border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.category.index' , $category->id)}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>برندها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)
                                    <a href="{{route('product.special.brand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="{{$brand->id == $value->id  ? 'bg-secondary' : 'bg-light'}} btn border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.brand.index' , $brand->id)}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                    <div class="w-100 changeScrollBar" style="height: 557px ; scrollbar-width:none;">
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>دسته‌بندی‌ها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($categoryList as $value)
                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom text-dark">
                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <h5>برندها</h5>
                            </div>
                            <div style="max-height: 200px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                @foreach($brands as $value)
                                    <a href="{{route('product.special.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px"  class="{{$brand->id == $value->id  ? 'bg-secondary' : 'bg-light'}} btn border mt-1 "> {{$value->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                            <div class="">
                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">از</div>
                                    <section class="d-flex">
                                        <div class="max-value h4">5,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 20px ; border-radius: 15px">
                                    <div class="" style="color: #808080">تا</div>
                                    <section class="d-flex">
                                        <div class="min-value h4">90,000,000</div>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </section>
                                </div>
                            </div>
                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.categorybrand.index' , [$category->id , $brand->id])}}" style="width: 85% ; margin-right: 7%">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                </div>
                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                <style>
                    .ui-slider-range {
                        background-color: #00a3b2;
                    }
                    .ui-slider-handle{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-top: -3px;
                        padding: 10px;
                        border-radius: 50%;
                        background-color: #00a3b2 !important;
                        /*box-shadow: 0 0 10px rgba(0, 103, 113, 0.62);*/
                        border: 2px solid white!important;
                        outline: none!important;
                    }
                </style>
            </div>
        </div>


        <div class="position-relative  kala-products-box-left" style="float: right">
            <div class="w-100  border-bottom h2  px-3 d-flex align-items-center justify-content-start" style="height: 40px">
                {{--            sort-Box--}}
                <div class=" h-100 kala-sortBox-big">
                    <div class="h-100" style="float: right">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="bi-sort-down h3 me-2 mt-2"> </i>
                            <div class="">مرتب‌سازی:</div>

                        </div>
                    </div>
                    @if(strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                        <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'category') && strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                        <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'brands') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                        <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'brands') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                        <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                        <a href="{{route('product.moreSell.index' , ['sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.moreSell.index' , ['sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.moreSell.index' , ['sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                        <a href="{{route('product.moreSell.category.index' , ['category'=>$category->id , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.moreSell.category.index' , ['category'=>$category->id , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.moreSell.category.index' , ['category'=>$category->id , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                        <a href="{{route('product.moreSell.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.moreSell.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.moreSell.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                        <a href="{{route('product.moreSell.brand.index' , ['brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.moreSell.brand.index' , ['brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.moreSell.brand.index' , ['brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                        <a href="{{route('product.special.index' , ['sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.special.index' , ['sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.special.index' , ['sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.special.index' , ['sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                        <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                        <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                    @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                        <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'moreesells'])}}" class="{{request()->query('sort') == 'moreesells' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-5" style="float: right ; text-decoration: none ; color: #969696">پرفروش‌ترین</a>
                        <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'newAdded'])}}" class="{{request()->query('sort') == 'newAdded' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">جدید‌ترین</a>
                        <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'inexpensive'])}}" class="{{request()->query('sort') == 'inexpensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">ارزان‌ترین</a>
                        <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'expensive'])}}" class="{{request()->query('sort') == 'expensive' ? 'text-danger' : ''}} h-100 d-flex align-items-center justify-content-center ms-3" style="float: right ; text-decoration: none ; color: #969696">گران‌ترین</a>
                    @endif
                </div>
                {{--filter-Smoll--}}
                <div class="kala-sortBox-smoll align-items-center justify-content-start">

                    <div class="h5" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi-sliders h4" ></i> فیلترها
                    </div>



                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog overflow-hidden shadow " style="height: 90vh ;border-radius: 15px  ">
                            <div class="modal-content bg-white h-100 border-0 pb-3"  style=" ">
                                <div class="w-100 py-3 h4 text-center border-bottom position-relative">فیلتر‌ها</div>
                                @if(strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                                    <div class="w-100 mt-1 p-1 text-center h4" style="">برند‌ها</div>
                                    <div class=" border-bottom bg-white" style="height: 500px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                                        @foreach($brands as $value)
                                            <a href="{{route('product.category.brand.index' ,['category'=> $category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 25px"  class="btn bg-light border mt-1 "> {{$value->name}} </a>
                                        @endforeach
                                    </div>
                                    <div class="mt-2 ">
                                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                                        <div class="">
                                            <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <div class="" style="color: #808080">از</div>
                                                <section class="d-flex">
                                                    <div class="max-value1 h4">5,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                            <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <div class="" style="color: #808080">تا</div>
                                                <section class="d-flex">
                                                    <div class="min-value1 h4">90,000,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                        </div>
                                        <form class=" mt-4 bg-white" method="get" action="{{route('product.category.index' , $category->id)}}" style="width: 85% ; margin-right: 7%">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                            </div>
                                            <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>

                                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'category') && strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                                    <div class="w-100 mt-1 p-1 text-center  h4" style="">برند‌ها</div>
                                    <div class=" border-bottom" style="height: 500px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                                        @foreach($brands as $value)
                                            <a href="{{route('product.category.brand.index' ,['category'=> $category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 25px"  class="{{$value->id == $brand->id ? 'bg-secondary' : 'bg-light'}} btn  border mt-1 "> {{$value->name}} </a>
                                        @endforeach
                                    </div>
                                    <div class="mt-2">
                                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                                        <div class="">
                                            <div class=" h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <p class="" style="right: 10px ; top: 30% ; color: #808080">از</p>
                                                <section class="d-flex">
                                                    <div class="max-value1 h4">5,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                            <div class=" h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <p class="" style="right: 10px ; top: 30% ; color: #808080">تا</p>
                                                <section class="d-flex">
                                                    <div class="min-value1 h4">90,000,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                        </div>

                                        <form class=" mt-3" method="get" action="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id])}}" style="width: 85% ; margin-right: 7%">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount"   style="border:0; font-weight:bold;">
                                            </div>
                                            <div id="" class="bg-light slider-range"></div>
                                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                <button class="btn btn-light "><i class="bi-check-lg"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'brands') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                                    <div class="w-100 mt-1 p-1 text-center  h4" style="">دسته‌بندی‌ها</div>
                                    <div class=" position-relative border-bottom" style="height: 500px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                                        @foreach($categoryList as $value)
                                            <a href="{{route('product.brands.category.index' ,['brand'=> $brand->id , 'category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                        @endforeach
                                    </div>
                                    <div class="mt-2">
                                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                                        <div class="">
                                            <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <div class="" style="color: #808080">از</div>
                                                <section class="d-flex">
                                                    <div class="max-value1 h4">5,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                            <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <div class="" style="color: #808080">تا</div>
                                                <section class="d-flex">
                                                    <div class="min-value1 h4">90,000,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                        </div>
                                        <form class=" mt-4" method="get" action="{{route('product.brands.index' , $brand->id)}}" style="width: 85% ; margin-right: 7%">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                            </div>
                                            <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'brands') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                                    <div class="w-100 mt-1 p-1 text-center  h4" style="">دسته‌بندی‌ها</div>
                                    <div class=" position-relative border-bottom" style="height: 500px ; overflow: scroll ; scrollbar-color:#efefef transparent">
                                        @foreach($categoryList as $value)
                                            <a href="{{route('product.brands.category.index' ,['brand'=> $brand->id , 'category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                        @endforeach
                                    </div>
                                    <div class="mt-2">
                                        <div class="w-100 mt-1 p-1 text-center  h4" style="">قیمت</div>
                                        <div class="">
                                            <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <div class="" style="color: #808080">از</div>
                                                <section class="d-flex">
                                                    <div class="max-value1 h4">5,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                            <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                <div class="" style="color: #808080">تا</div>
                                                <section class="d-flex">
                                                    <div class="min-value1 h4">90,000,000</div>
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </section>
                                            </div>
                                        </div>
                                        <form class=" mt-4" method="get" action="{{route('product.brands.category.index' , [$brand->id , $category->id])}}" style="width: 85% ; margin-right: 7%">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                            </div>
                                            <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                            <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.moreSell.brand.index' ,['brand'=>$value->id])}}"  style=" width: 90% ; display: block "  class="btn m-auto bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.index')}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.moreSell.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px ; display: block"  class=" m-auto btn bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.category.index' , $category->id)}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.moreSell.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px ; display: block"  class="  m-auto btn bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.categorybrand.index' , [$category->id , $brand->id])}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.moreSell.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.moreSell.brand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px ; display: block"  class=" m-auto btn bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.moreSell.brand.index' , $brand->id)}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.special.brand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px ; display: block"  class=" m-auto btn bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.index')}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.special.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px ; display: block"  class=" m-auto btn bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.category.index' , $category->id)}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.special.brand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px ; display: block"  class=" m-auto btn bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.brand.index' , $brand->id)}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <div class="w-100 overflow-scroll" style="height: 100% ; scrollbar-width:none;">
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>دسته‌بندی‌ها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseTwo" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($categoryList as $value)
                                                    <a href="{{route('product.special.category.index' ,['category'=> $value->id])}}"  style="display: {{$value->child != '[]' ? 'none': 'block'}} ; width: 90%"  class="{{$category->id == $value->id ? 'btn-secondary' : 'btn-light'}} m-auto border mt-1 btn"> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 border-bottom text-dark">
                                            <div style="height: 45px ; cursor: pointer" class="accordion-button collapsed bg-white text-dark" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <h5>برندها</h5>
                                            </div>
                                            <div style="max-height: 300px!important" id="flush-collapseOne" class="accordion-collapse collapse overflow-scroll ">
                                                @foreach($brands as $value)
                                                    <a href="{{route('product.special.categorybrand.index' ,['category'=>$category->id , 'brand'=>$value->id])}}"  style=" width: 90% ; margin-right: 13px ; display: block"  class=" m-auto btn bg-light border mt-1 "> {{$value->name}} </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-100 mt-1 p-1 text-center  h5" style="">قیمت</div>
                                            <div class="">
                                                <div class=" shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">از</div>
                                                    <section class="d-flex">
                                                        <div class="max-value1 h4">5,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                                <div class="shadow h4 border p-3 text-end d-flex align-items-center justify-content-between " style="width: 85% ; margin-right: 35px ; border-radius: 15px">
                                                    <div class="" style="color: #808080">تا</div>
                                                    <section class="d-flex">
                                                        <div class="min-value1 h4">90,000,000</div>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </section>
                                                </div>
                                            </div>
                                            <form class=" mb-5 mt-4" method="get" action="{{route('product.special.categorybrand.index' , [$category->id , $brand->id])}}" style="width: 85% ; margin-right: 7%">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input name="range" type="hidden" id="" class="text-end mt-3 d-flex align-items-center justify-content-center me-1 amount">
                                                </div>
                                                <div id="" class="bg-light position-relative slider-range" style="margin-right: 4px"></div>
                                                <div class="w-100 mt-3 d-flex align-items-center justify-content-center">
                                                    <button class="shadow btn btn-light border"><i class="bi-check-lg"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                <div type="button" class="btn btn-transparent position-absolute" data-bs-dismiss="modal" style="left: 5px ; top: 10px">
                                    <i class="bi-x-lg h5"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="h5 ms-4" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#exampleModalB">
                        <i class="bi-sort-down h3" ></i>
                        @if(request()->query('sort') == 'moreesells')پرفروش‌ترین
                        @elseif(request()->query('sort') == 'newAdded')جدید‌ترین
                        @elseif(request()->query('sort') == 'inexpensive')ارزان‌ترین
                        @elseif(request()->query('sort') == 'expensive')گران‌ترین
                        @elseمرتب‌سازی@endif
                    </div>

                    <div class="modal fade" id="exampleModalB" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog overflow-hidden shadow" style="height: 300px ;border-radius: 15px  ">
                            <div class="modal-content bg-white h-100 border-0 pb-3 "  style=" ">
                                <div class="w-100 py-3 h4 text-center border-bottom">مرتب‌سازی</div>
                                @if(strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                                    <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.category.index' , ['category'=> $category->id ,  'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'category') && strstr(request()->path() , 'brand') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special') && !strstr(request()->path() , 'brands'))
                                    <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.category.brand.index' , ['category'=> $category->id , 'brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'brands') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                                    <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.brands.index' , ['brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'brands') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'special'))
                                    <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.brands.category.index' , ['brand'=>$brand->id , 'category'=>$category->id , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.moreSell.index' , ['sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.moreSell.index' , ['sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.moreSell.index' , ['sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.moreSell.category.index' , ['category'=>$category->id , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.moreSell.category.index' , ['category'=>$category->id , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.moreSell.category.index' , ['category'=>$category->id , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.moreSell.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.moreSell.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.moreSell.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'moreSell') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.moreSell.brand.index' , ['brand'=>$brand->id , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.moreSell.brand.index' , ['brand'=>$brand->id , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.moreSell.brand.index' , ['brand'=>$brand->id , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.special.index' , ['sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.special.index' , ['sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.special.index' , ['sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.special.index' , ['sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && !strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.special.category.index' , ['category'=> $category->id , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'special') && !strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.special.brand.index' , ['brand'=>$brand->id  , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                @if(strstr(request()->path() , 'special') && strstr(request()->path() , 'category') && strstr(request()->path() , 'brand'))
                                    <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'moreesells'])}}" class="btn btn-light w-75 m-auto py-3 border">پرفروش‌ترین</a>
                                    <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'newAdded'])}}" class="btn btn-light w-75 m-auto py-3 border">جدید‌ترین</a>
                                    <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'inexpensive'])}}" class="btn btn-light w-75 m-auto py-3 border">ارزان‌ترین</a>
                                    <a href="{{route('product.special.categorybrand.index' , ['category'=> $category->id ,'brand'=>$brand->id  , 'sort'=> 'expensive'])}}" class="btn btn-light w-75 m-auto py-3 border">گران‌ترین</a>
                                @endif
                                <div type="button" class="btn btn-transparent position-absolute" data-bs-dismiss="modal" style="left: 5px ; top: 10px">
                                    <i class="bi-x-lg h5"></i>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

            {{--product_box--}}
            <div class="container-fluid">
                <div class="row">

                    @foreach($varieties as $variety)
                            <a href="{{route('productView' , $variety->products->id)}}" target="_blank" class="text-dark col-12 col-sm-6 col-md-4 col-xl-3  p-0  kala-products-box-respons">
                                @php
                                    $image = explode(',' , $variety->products->image);
                                @endphp
                                <div class="kalaBox{{$variety->products->id}} border py-2 rounded-3 kala-products-box-respons-box position-relative" >
                                    <div class="position-absolute " style=" left: 10px ; top: 20px">
                                        @if($variety->products->variety_type == 'color')
                                            <div class="rounded-circle border border-2" style="background-color: {{$variety->color->color}} ; width: 13px ; height: 13px"></div>
                                        @elseif($variety->products->variety_type == 'size')
                                            <div class="rounded-3 border p-1">{{$variety->size->size}}</div>
                                        @elseif($variety->products->variety_type == 'Weight')
                                            <div class="rounded-3 border p-1 ">{{$variety->weight->weight}}</div>
                                        @elseif($variety->products->variety_type == 'volume')
                                            <div class="rounded-3 border p-1 ">{{$variety->volume->volume}}</div>
                                        @elseif($variety->products->variety_type == 'number')
                                            <div class="rounded-3 border p-1 ">{{$variety->num->number}}</div>
                                        @endif
                                    </div>
                                    <img class="kala-products-box-respons-box-image" src="{{url('images/'.$image[0]) }}"/>
                                    <div class="w-100 px-2" style="height: 125px ; display: flex ; align-items: center ; justify-content: space-around ; flex-direction: column">
                                        <div class=" w-100 px-3 overflow-hidden " style="height: 50px">{{$variety->products->name}}</div>
                                        <div class="w-100 px-2 kala-products-box-respons-box-price">
                                            <div class="w-100 text-end px-2 position-relative" style="height: 80px">
                                                @if($variety->products->active == 0)
                                                    <div class="w-100 h-100 opacity-25 h4 d-flex align-items-center justify-content-center"> غیر فعال</div>
                                                @elseif($variety->active == 0 || $variety->remain == 0)
                                                    <div class="w-100 h-100 opacity-25 h4 d-flex align-items-center justify-content-center"> ناموجود </div>
                                                @else
                                                    @if($variety->price_off != $variety->price)
                                                        <div class="bg-danger position-absolute px-2 rounded-pill text-light" style="right: 0 ; top: 30%">
                                                            <b style="font-size: 16px">{{(1-(round($variety->price_off / $variety->price , 2)))*100 . '%'}}</b>
                                                        </div>
                                                        <div class="position-absolute" style="left: 0 ; top: 30% ; font-size: 20px">
                                                            {{number_format($variety->price_off/10) }}
                                                            @php
                                                                echo file_get_contents('images/toman.svg');
                                                            @endphp
                                                        </div>
                                                        <div class=" position-absolute" style="left: 30px ; top: 70% ; color: #8f8f8f ; text-decoration: line-through; font-size: 13px ; text-decoration-color: #a2a2a2">
                                                            {{number_format($variety->price/10) }}
                                                        </div>
                                                    @else
                                                        <div class="position-absolute" style="left: 0 ; top: 30% ; font-size: 20px">
                                                            {{number_format($variety->price/10) }}
                                                            @php
                                                                echo file_get_contents('images/toman.svg');
                                                            @endphp
                                                        </div>
                                                    @endif
                                                    <style>
                                                        .kalaBox{{$variety->products->id}}{

                                                        }
                                                        .kalaBox{{$variety->products->id}}:hover{
                                                            box-shadow: 0 0 15px #d7d7d7;
                                                        }
                                                    </style>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>



<div class="w-100 d-flex align-items-center justify-content-center mt-3">
    {{$varieties->render()}}
</div>
@endsection






@vite(['resources/js/products.js'])
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>


    $( function() {

        $( ".slider-range" ).slider({

            range: true,
            min: 5000,
            max: 90000000,
            values: [ 5000, 90000000 ],
            slide: function( event, ui ) {
                let mini;
                let min = ui.values[ 1 ];
                let minS = min.toString();
                let minA = minS.split('');
                if (minS.split('').length === 8){
                    mini = minA[0] + '' + minA[1] + ',' + minA[2] + '' + minA[3] + '' + minA[4] + ',' + minA[5] + '' + minA[6] + '' + minA[7];
                }else if(minS.split('').length === 7){
                    mini = minA[0] + ',' + minA[1] + '' + minA[2] + '' + minA[3] + ',' + minA[4] + '' + minA[5] + '' + minA[6];
                }else if(minS.split('').length === 6){
                    mini = minA[0] + '' + minA[1] + '' + minA[2] + ',' + minA[3] + '' + minA[4] + '' + minA[5];
                }else if(minS.split('').length === 5){
                    mini = minA[0] + '' + minA[1] + ',' + minA[2] + '' + minA[3] + '' + minA[4];
                }else if(minS.split('').length === 4){
                    mini = minA[0] + ',' + minA[1] + '' + minA[2] + '' + minA[3];
                }

                let maxi;
                let max = ui.values[ 0 ];
                let maxS = max.toString();
                let maxA = maxS.split('');
                if (maxS.split('').length === 8){
                    maxi = maxA[0] + '' + maxA[1] + ',' + maxA[2] + '' + maxA[3] + '' + maxA[4] + ',' + maxA[5] + '' + maxA[6] + '' + maxA[7];
                }else if(maxS.split('').length === 7){
                    maxi = maxA[0] + ',' + maxA[1] + '' + maxA[2] + '' + maxA[3] + ',' + maxA[4] + '' + maxA[5] + '' + maxA[6];
                }else if(maxS.split('').length === 6){
                    maxi = maxA[0] + '' + maxA[1] + '' + maxA[2] + ',' + maxA[3] + '' + maxA[4] + '' + maxA[5];
                }else if(maxS.split('').length === 5){
                    maxi = maxA[0] + '' + maxA[1] + ',' + maxA[2] + '' + maxA[3] + '' + maxA[4];
                }else if(maxS.split('').length === 4){
                    maxi = maxA[0] + ',' + maxA[1] + '' + maxA[2] + '' + maxA[3];
                }
                $( ".amount" ).val(ui.values[ 0 ] + "-" + ui.values[ 1 ] );

                document.querySelector('.min-value').innerHTML = mini;
                document.querySelector('.max-value').innerHTML = maxi;

                document.querySelector('.min-value1').innerHTML = mini;
                document.querySelector('.max-value1').innerHTML = maxi;

            }
        });
        $( ".amount" ).val($( ".slider-range" ).slider("values", 0 ) +
            "-" + $( ".slider-range" ).slider( "values",1 ) );

    } );


</script>

