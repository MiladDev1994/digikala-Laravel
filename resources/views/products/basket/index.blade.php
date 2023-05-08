@extends('layouts.app')
@vite(['resources/css/basket.css'])
@section('main')

    <div class="w-100  mt-4">
        <div class="basket-box m-auto">
            <div class="basket-box-products position-relative" >
                <a href="{{route('basket.destroyAll')}}" onclick="" class="position-absolute text-dark" style="left: 25px ; top: 10px"><i class="bi-x-lg h4"></i></a>
                <div class="border m-auto overflow-hidden" style="width: 98% ; border-radius: 15px ">
                    <h5 class="px-4 py-3" style="font-weight: 600"> سبد خرید شما </h5>
                    <p class="px-4 opacity-50" style="font-size: 12px">
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
                        {{$basketNumber}} کالا
                    </p>

                    @foreach($varietyBasket as $buys)
                        @php
                            $images = explode(',' , $buys->products->image);
                        @endphp
                        <div class="w-100 border-bottom d-flex">


                            <div class=" d-flex align-items-center justify-content-center flex-column py-3" style="width: 200px">
                                <a href="{{route('productView' , $buys->products->id)}}" class="m-auto d-flex align-items-center justify-content-center">
                                <img width="70%" src="{{url('images/'.$images[0])}}">
                                </a>
                                <div class="w-75  bg-light border border-2 mt-3 rounded-3 d-flex">
                                    @foreach($basketItem as $item)
                                        @if($item['id'] == $buys->id)
                                                 <div class="h-100 w-100 py-1 d-flex align-items-center justify-content-center" style="cursor: pointer">
                                                     <form method="post" action="{{route('basket.store')}}">
                                                         @csrf
                                                         <input type="hidden" value="{{$item['id']}}" name="id">
                                                         <input type="hidden" value="{{$item['price']}}" name="price">
                                                         <input type="hidden" value="{{$item['number']}}" name="number">
                                                         <button class="{{$item['number'] >= $buys->remain ? 'd-none' : 'd-block'}}" style="border: none ; background-color: transparent ; outline: none"><i class="bi-plus-lg text-danger h4 mt-2" ></i></button>
                                                     </form>

                                                 </div>


                                                 <div class="h-100 w-100 py-1 d-flex align-items-center justify-content-center h4  text-danger">
                                                     {{$item['number']}}
                                                 </div>


                                                 <div class="h-100 w-100 py-1 d-flex align-items-center justify-content-center" style="cursor: pointer">

                                                     <form method="post" action="{{route('basket.destroy')}}">
                                                         @csrf
                                                         <input type="hidden" value="{{$item['id']}}" name="id">
                                                         <input type="hidden" value="{{$item['price']}}" name="price">
                                                         <input type="hidden" value="{{$item['number']}}" name="number">
                                                         <button class="" style="border: none ; background-color: transparent ; outline: none"><i class="bi-dash-lg text-danger h4 mt-2" ></i></button>
                                                     </form>
                                                 </div>

                                        @endif
                                    @endforeach

                                </div>


                            </div>



                            <div class="" style="width: 100%">
                                <div class="py-2" style="font-weight: 700 ; font-size: 15px">{{$buys->products->name}}</div>
                                <div class="py-2 d-flex mt-1" >
                                    @if($buys->products->variety_type == 'color')
                                        <div class="rounded-circle me-2" style="background-color: {{$buys->color->color}} ; width: 20px ; height: 20px"></div>
                                        <div class="h-100 opacity-50">{{$buys->color->name}}</div>

                                    @elseif($buys->products->variety_type == 'size')
                                        <div class="rounded-3 border p-1">{{$buys->size->size}}</div>
                                    @elseif($buys->products->variety_type == 'Weight')
                                        <div class="rounded-3 border p-1 ">{{$buys->weight->weight}}</div>
                                    @elseif($buys->products->variety_type == 'volume')
                                        <div class="rounded-3 border p-1 ">{{$buys->volume->volume}}</div>
                                    @elseif($buys->products->variety_type == 'number')
                                        <div class="rounded-3 border p-1 ">{{$buys->num->number}}</div>
                                    @endif
                                </div>

                                <div class=" d-flex align-items-center opacity-50" >
                                    <i class="bi-check2-circle h4 me-1 mt-2" ></i>
                                    <div class="h-100 ">
                                        گارانتی
                                        {{$buys->warranty->period}}
                                        {{$buys->warranty->name}}
                                    </div>
                                </div>

                                <div class=" d-flex align-items-center mt-1 opacity-50" >
                                    <i class="bi-shop h4 me-2" ></i>
                                    <div class="h-100 ">
                                        @foreach($basketItem as $item)
                                            @if($item['id'] == $buys->id)
                                                {{$buys->user->name}}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class=" d-flex align-items-center mt-1" >
                                    @foreach($basketItem as $item)
                                        @if($item['id'] == $buys->id)

                                            @if($item['price'] == $buys->price_off)
                                                <h5 class="h-100 mt-2">{{number_format($buys->price_off/10*$item['number']) }}</h5>
                                                @php
                                                    echo file_get_contents('images/toman.svg');
                                                @endphp
                                                <div class="h-100 ms-5" style="color: #ff0000">
                                                    @if($buys->price_off != $buys->price)
                                                    تخفیف {{number_format((($buys->price/10)-($buys->price_off/10))*$item['number'])}}
                                                    @php
                                                        echo file_get_contents('images/tomanRed.svg');
                                                    @endphp
                                                    @endif
                                                </div>
                                            @else
                                                <div class="w-100">
                                                    <div class=" alert-danger p-2 rounded-3 me-5 changeFee">قیمت کالا تغییر کرده است</div>

                                                    <div class="d-flex py-3">
                                                        قیمت جدید
                                                        <h5 class="h-100 ms-3">{{number_format($buys->price_off/10) }}</h5>
                                                        @php
                                                            echo file_get_contents('images/toman.svg');
                                                        @endphp
                                                    </div>
                                                </div>

                                            @endif
                                        @endif
                                    @endforeach
                                </div>

                                @foreach($basketItem as $item)
                                    @if($item['id'] == $buys->id)
                                        @if($item['number'] > $buys->remain)
                                            <div class="alert-danger p-2 rounded-3 me-5 mb-3 changeFee">موجودی انبار تغییر کرده است</div>
                                        @endif
                                    @endif
                                @endforeach





                            </div>

{{--                            {{$images[0]}}--}}
                        </div>
                    @endforeach



                </div>

            </div>

            <div class="basket-box-sumBuy">
                <div class="basket-box-sumBuy-into bg-white border m-auto  p-3 d-flex align-items-start justify-content-center" style="">
                    @php
                        $sumPrice = 0;
                        $sunPrideOff = 0;
                        $sumOK = [];
                    @endphp
                    @foreach($varietyBasket as $item)
                        @foreach($basketItem as $value)
                            @if($value['id'] == $item->id)
                                @php
                                    $sumPrice += $item->price*$value['number'];
                                    $sunPrideOff += $item->price_off*$value['number'];
                                @endphp

                                @if($value['number'] <= $item->remain)
                                    @php
                                        array_push($sumOK , 1)
                                    @endphp
                                @else
                                    @php
                                        array_push($sumOK , 0)
                                    @endphp
                                @endif


                            @endif
                        @endforeach



                    @endforeach

                    <div class=" basket-box-sumBuy-into-FirstChils" style="width: 100%">
                        <div class=" d-flex align-items-center justify-content-between opacity-75  basket-box-sumBuy-into-FirstChils-1" style="font-weight: 600">
                            <div class="">قیمت کالاها</div>
                            <div class="mt-2">
                                {{number_format($sumPrice/10) }}
                                @php
                                    echo file_get_contents('images/toman.svg');
                                @endphp
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between basket-box-sumBuy-into-FirstChils-1" style="font-weight: 700">
                            <div class="">جمع سبد خرید</div>
                            <div class="mt-2">
                                {{number_format($sunPrideOff/10) }}
                                @php
                                    echo file_get_contents('images/toman.svg');
                                @endphp
                            </div>
                        </div>
                        @if($sunPrideOff != $sumPrice)
                        <div class="d-flex align-items-center justify-content-between  text-danger basket-box-sumBuy-into-FirstChils-1" style="font-weight: 700">
                            <div class="">سود شما از خرید</div>
                            <div class="mt-2">
                                {{number_format(($sumPrice/10)-($sunPrideOff/10)) }}
                                @php
                                    echo file_get_contents('images/tomanRed.svg');
                                @endphp
                            </div>
                        </div>
                        @endif
                    </div>


                    <div class=" basket-box-sumBuy-into-LastChils" style="width: 100%">
                        @if(in_array(0 , $sumOK) || count($basketItem) == 0)
                            <div class="alert-danger text-center py-2 mt-4"> تغییر در یکی از کالاها </div>
                        @else
                            <a href="{{route('basket.shipping')}}" class="w-100 py-3 bg-danger d-block rounded-3 text-white text-center h5 mt-4" style="text-decoration: none"> ادامه</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="w-100 fakeUnderBasket"></div>


@endsection

@vite(['resources/js/basket.js'])
