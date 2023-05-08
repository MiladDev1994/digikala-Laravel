@extends('user.index')
@section('center')


    <div class="user-box-left-too-downBox w-100 border mt-2 py-3">

        <div class="h5 px-3  py-3 d-inline-block" style="font-weight: 600">دیدگاه‌های من</div>

        @foreach($comments as $comment)
            <div class="w-100 border-top d-flex align-items-center justify-content-between" >
                @php
                    $images = explode(',' , $comment->product[0]->image)
                @endphp
                <img width="120px" src="{{url('images/' . $images[0])}}">

                <div class="w-100 h-100 py-2 position-relative">
                    <p style="font-size: 16px ; font-weight: 600" class="mt-4">{{$comment->product[0]->name}}</p>

                    <div class=" py-4 px-4">
                        <div class="w-100">
                            <div class="d-inline-block {{$comment->score < 2 ? "bg-danger" : ''}} {{$comment->score < 4 ? "bg-warning" : 'bg-success'}}  text-white px-3 rounded-3" style="font-weight: 600">{{$comment->score}}</div>
                            <div class="d-inline-block h5  px-3" style="font-weight: 600">{{$comment->titr}}</div>
                        </div>
                        <div class="w-100 mt-2 py-4 border-bottom">
                            <div class="d-inline-block opacity-50">{{verta($comment->created_at)->year}}/{{verta($comment->created_at)->month}}/{{verta($comment->created_at)->day}}</div>
                        </div>
                        <div class="mt-1  py-2">
                            @if($comment->proposal == 1)
                                <div class="text-success" style="font-weight: 600"><i class="bi-hand-thumbs-up h5 me-1"> </i>توصیه میکنم</div>
                            @else
                                <div class="text-danger" style="font-weight: 600"><i class="bi-hand-thumbs-down h5 me-1"> </i>توصیه نمیکنم</div>
                            @endif
                            <div class="d-inline-block mt-3  px-3" style="font-weight: 600">{{$comment->text}}</div>
                        </div>
                    </div>



{{--                    <p style="font-size: 16px ; font-weight: 600" class="opacity-50">--}}
{{--                        {{number_format($order->number) }} عدد--}}
{{--                    </p>--}}

{{--                    <p style="font-size: 16px ; font-weight: 600" class="opacity-75">جمع کل:--}}
{{--                        {{number_format(($order->price)*($order->number)) }}--}}
{{--                        @php--}}
{{--                            echo file_get_contents('images/toman.svg');--}}
{{--                        @endphp--}}
{{--                    </p>--}}

{{--                    <p style="font-size: 16px ; font-weight: 600" class="opacity-75">تاریخ ارسال:--}}
{{--                        {{verta($order->date)->year}}/{{verta($order->date)->month}}/{{verta($order->date)->day}}--}}
{{--                        ساعت:{{$order->time}}--}}

{{--                    </p>--}}


                </div>


            </div>

        @endforeach


    </div>
@endsection
