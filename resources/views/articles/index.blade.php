@extends('layouts.app')
@vite(['resources/css/article.css'])
@section('main')

    <div class="w-100" style="">
        <div class="m-auto kala-articlePage-box">
            <div class="kala-articlePage-box-left position-relative" style="width: 300px ; float: left ; height: 100%">
                <div class="border position-sticky m-auto" style="width: 90% ; height: 800px ; border-radius: 15px ; top: 180px">
                    <div class="border-bottom" style="width: 100% ; height: 340px">
                        <a href="{{route('productView' , $productArticle[0]->id)}}" target="_blank" class="w-100 text-dark p-0" style="text-decoration: none">
                            @php
                                $image = explode(',' , $productArticle[0]->image);
                            @endphp
                            <div class="m-auto py-2 d-flex align-items-center justify-content-center flex-column">
                                <img class="w-75" src="{{url('images/'.$image[0]) }}"/>
                                <div class="w-100 px-2" style="height: 125px ; display: flex ; align-items: center ; justify-content: space-around ; flex-direction: column">
                                    <div class=" w-100 px-3 overflow-hidden " style="height: 50px">{{$productArticle[0]->name}}</div>
                                    <div class="w-100 px-2 kala-products-box-respons-box-price">
                                        <div class="w-100 text-end px-2 position-relative" style="height: 80px">
                                            @php
                                                $fee = [];
                                                $feeOff = [];
                                            @endphp
                                            @for($v = 0; $v < count($productArticle[0]->variation); $v++)
                                                @php
                                                    array_push($fee , $productArticle[0]->variation[$v]->price);
                                                    array_push($feeOff , $productArticle[0]->variation[$v]->price_off);
                                                @endphp
                                            @endfor
                                            @php
                                                $indexNumFeeOff =  array_search(min($feeOff) , $feeOff);
                                            @endphp
                                            @if(round((($fee[$indexNumFeeOff] / min($feeOff))-1)*100) != 0)
                                                <div class="bg-danger position-absolute px-2 rounded-pill text-light" style="right: 0 ; top: 30%">
                                                    <b style="font-size: 16px">{{round((($fee[$indexNumFeeOff] / min($feeOff))-1)*100)}}%</b>
                                                </div>
                                                <div class="position-absolute bg" style="left: 0 ; top: 30% ; font-size: 20px">
                                                    {{number_format(min($feeOff)/10) }}
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </div>
                                                <div class=" position-absolute" style="left: 30px ; top: 70% ; color: #8f8f8f ; text-decoration: line-through; font-size: 13px ; text-decoration-color: #a2a2a2">
                                                    {{number_format($fee[$indexNumFeeOff]/10) }}
                                                </div>
                                            @else
                                                <div class="position-absolute" style="left: 0 ; top: 30% ; font-size: 20px">
                                                    {{number_format($fee[$indexNumFeeOff]/10) }}
                                                    @php
                                                        echo file_get_contents('images/toman.svg');
                                                    @endphp
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <h5 class="text-center py-2 h4">مقاله ها</h5>
                        <div class="w-100 overflow-scroll" style="height: 412px ; scrollbar-width:none;">
                            @foreach($articlesAll as $item)
                                <a href="{{route('article.index' , $item->id)}}" class="border-bottom text-dark d-flex align-items-center justify-content-center flex-column m-auto py-3" style="width: 95% ; text-decoration: none">
                                    <div class="border" style="width: 50px; height: 50px ; border-radius: 50% ; background-image: url('{{url("images/".$item->logo)}}') ; background-size: cover ; background-position: center"></div>
                                    <div class="w-100 overflow-hidden text-center mt-1" style="font-weight: 550">{{$item->subject}}</div>

                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class=" kala-articlePage-box-right py-5" style="float: left">

                <div class="m-auto p-4 d-flex align-items-center justify-content-center" style="width: 70%" >
                    <img src="{{url('images/'.$articles[0]->file)}}" class="w-100 border shadow-sm" style="border-radius: 10px" alt="">
                </div>
                <div class="m-auto kala-articlePage-box-right-textBox">
                    <h3 class="w-100 m-auto mt-5"> مقدمه:</h3>
                    <div class="h5 w-100 m-auto  border-bottom py-4" style="font-weight: 500 ; line-height: 2">{{$articles[0]->Introduction}}</div>

                    <a href="{{$productArticle[0]->dkp}}" class="w-100 text-dark p-0 kala-articlePage-box-right-textBox-product" style="text-decoration: none">
                        @php
                            $image = explode(',' , $productArticle[0]->image);
                        @endphp
                        <div class="w-100 m-auto mt-3 py-2 d-flex align-items-center justify-content-center border" style="border-radius: 15px">
                            <img class="w-50" src="{{url('images/'.$image[0]) }}"/>
                            <div class="w-100 px-2" style="height: 125px ; display: flex ; align-items: center ; justify-content: space-around ; flex-direction: column">
                                <div class=" w-100 px-3 overflow-hidden " style="height: 50px">{{$productArticle[0]->name}}</div>
                                <div class="w-100 px-2 kala-products-box-respons-box-price">
                                    <div class="w-100 text-end px-2 position-relative" style="height: 80px">
                                        @php
                                            $fee = [];
                                            $feeOff = [];
                                        @endphp
                                        @for($v = 0; $v < count($productArticle[0]->variation); $v++)
                                            @php
                                                array_push($fee , $productArticle[0]->variation[$v]->price);
                                                array_push($feeOff , $productArticle[0]->variation[$v]->price_off);
                                            @endphp
                                        @endfor
                                        @php
                                            $indexNumFeeOff =  array_search(min($feeOff) , $feeOff);
                                        @endphp
                                        @if(round((($fee[$indexNumFeeOff] / min($feeOff))-1)*100) != 0)
                                            <div class="bg-danger position-absolute px-2 rounded-pill text-light" style="right: 0 ; top: 30%">
                                                <b style="font-size: 16px">{{round((($fee[$indexNumFeeOff] / min($feeOff))-1)*100)}}%</b>
                                            </div>
                                            <div class="position-absolute bg" style="left: 0 ; top: 30% ; font-size: 20px">
                                                {{number_format(min($feeOff)/10) }}
                                                @php
                                                    echo file_get_contents('images/toman.svg');
                                                @endphp
                                            </div>
                                            <div class=" position-absolute" style="left: 30px ; top: 70% ; color: #8f8f8f ; text-decoration: line-through; font-size: 13px ; text-decoration-color: #a2a2a2">
                                                {{number_format($fee[$indexNumFeeOff]/10) }}
                                            </div>
                                        @else
                                            <div class="position-absolute" style="left: 0 ; top: 30% ; font-size: 20px">
                                                {{number_format($fee[$indexNumFeeOff]/10) }}
                                                @php
                                                    echo file_get_contents('images/toman.svg');
                                                @endphp
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>


                    <div class="h5 w-100 m-auto mt-5" style="font-weight: 400 ; line-height: 2">{{$articles[0]->about1}}</div>
                    <div class="h5 w-100 m-auto mt-5" style="font-weight: 400 ; line-height: 2">{{$articles[0]->about2}}</div>
                    <div class="h5 w-100 m-auto mt-5" style="font-weight: 400 ; line-height: 2">{{$articles[0]->about3}}</div>
                    <div class="h5 w-100 m-auto mt-5" style="font-weight: 400 ; line-height: 2">{{$articles[0]->about4}}</div>
                </div>


            </div>
        </div>
    </div>




@endsection
@vite(['resources/js/article.js'])

