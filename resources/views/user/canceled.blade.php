@extends('user.index')
@section('center')


    <div class="user-box-left-too-downBox w-100 border mt-2 py-3">

        <div class="h5 px-3  py-3 d-inline-block" style="font-weight: 600">سفارشات لغو شده</div>
        @foreach($orders_canceled as $order)
            <div class="w-100 border-top d-flex align-items-center justify-content-between" >
                @php
                    $images = explode(',' , $order->variety[0]->products->image)
                @endphp
                <a href="{{route('productView' , $order->variety[0]->products->id) }}" target="_blank">
                    <img width="120px" src="{{url('images/' . $images[0])}}">
                </a>

                <div class="w-100 h-100 py-2 position-relative">
                    <p style="font-size: 16px ; font-weight: 600" class="mt-4">{{$order->variety[0]->products->name}}</p>


                    <div class="py-2 d-flex mt-1" >
                        @if($order->variety[0]->products->variety_type == 'color')
                            <div class="rounded-circle me-2" style="background-color: {{$order->variety[0]->color->color}} ; width: 20px ; height: 20px"></div>
                            <div class="h-100 opacity-50">{{$order->variety[0]->color->name}}</div>
                        @elseif($order->variety[0]->products->variety_type == 'size')
                            <div class="rounded-3 border p-1">{{$order->variety[0]->size->size}}</div>
                        @elseif($order->variety[0]->products->variety_type == 'Weight')
                            <div class="rounded-3 border p-1 ">{{$order->variety[0]->weight->weight}}</div>
                        @elseif($order->variety[0]->products->variety_type == 'volume')
                            <div class="rounded-3 border p-1 ">{{$order->variety[0]->volume->volume}}</div>
                        @elseif($order->variety[0]->products->variety_type == 'number')
                            <div class="rounded-3 border p-1 ">{{$order->variety[0]->num->number}}</div>
                        @endif
                    </div>

                    <p style="font-size: 16px ; font-weight: 600" class="mt-2 opacity-50">
                        {{number_format($order->price) }}
                        @php
                            echo file_get_contents('images/toman.svg');
                        @endphp
                    </p>

                    <p style="font-size: 16px ; font-weight: 600" class="opacity-50">
                        {{number_format($order->number) }} عدد
                    </p>

                    <p style="font-size: 16px ; font-weight: 600" class="opacity-75">جمع کل:
                        {{number_format(($order->price)*($order->number)) }}
                        @php
                            echo file_get_contents('images/toman.svg');
                        @endphp
                    </p>

                    <p style="font-size: 16px ; font-weight: 600" class="opacity-75">تاریخ ارسال:
                        {{verta($order->date)->year}}/{{verta($order->date)->month}}/{{verta($order->date)->day}}
                        ساعت:{{$order->time}}

                    </p>


                </div>


            </div>

        @endforeach








    </div>
@endsection
