@extends('layouts.app')
@vite(['resources/css/user_panel.css'])

@section('main')


<div class="w-100">
    <div class="user-box m-auto mt-4">

        <div class="user-box-right">
            <div class="user-box-right-too py-2 border m-auto">


                <div class="w-100 px-3 border-bottom py-2 ">
                    <div class="d-flex align-items-center justify-content-around">
                        <img width="60" src="{{url('image/df110dcf.svg')}}">
                        <div class="h-100 w-100 h4 ms-3 ">
                            <div class="h4">{{auth()->user()->name}}</div>
                            <div class="opacity-50">{{auth()->user()->phone}}</div>
                        </div>
                        <a href="" class=""><i class="bi-pencil h4 text-info"></i></a>
                    </div>
                    @if(auth()->user()->isSeller == 1)
                        <a href="" class="py-3 d-block text-info" style="text-decoration: none"> پنل فروشندگی</a>
                    @endif
                </div>

                <a href="{{route('user.panel.order')}}" class=" py-3 mt-2 px-3 d-flex {{request()->path() == 'user/Panel/order' || request()->path() == 'user/Panel/order/sent' || request()->path() == 'user/Panel/order/canceled' ? 'text-danger' : 'text-dark' }} " style="text-decoration: none" >
                    <i class="bi-bag h4 me-3 "></i>
                    <div class="h5" style="font-weight: 600">سفارش‌ها</div>
                </a>

                <a href="{{route('user.panel.favorite')}}" class=" py-3 px-3 d-flex {{request()->path() == 'user/Panel/favorite' ? 'text-danger' : 'text-dark' }}"  style="text-decoration: none">
                    <i class="bi-heart h4 me-3 mt-1"></i>
                    <div class="h5" style="font-weight: 600">لیست‌های من</div>
                </a>

                <a href="{{route('user.panel.comments')}}" class=" py-3 px-3 d-flex {{request()->path() == 'user/Panel/comments' ? 'text-danger' : 'text-dark' }}"  style="text-decoration: none">
                    <i class="bi-chat h4 me-3 "></i>
                    <div class="h5" style="font-weight: 600">دیدگاه‌ها</div>
                </a>

                <a href="{{ route('logout') }}" class=" py-3 px-3 d-flex text-dark" style="text-decoration: none" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="bi-box-arrow-right h4 me-3 "></i>
                    <div class="h5" style="font-weight: 600">خروج</div>
                </a>

            </div>
        </div>


        <div class="user-box-left">
            <div class="user-box-left-too w-100 border py-2 px-3 ">
                <div class="d-flex justify-content-between">
                    <h5 class="border-bottom border-2  border-danger py-3 d-inline-block" style="font-weight: 600">سفارش‌های من</h5>
                    <a href="" class="py-3 d-inline-block me-5 text-info" style="text-decoration: none" >  مشاهده همه > </a>
                </div>
                <div class="w-100 mt-5 d-flex align-items-center justify-content-around">
                    <a href="{{route('user.panel.order')}}" class="d-flex text-dark"  style="text-decoration: none">
                        <img src="{{url('images/userPanel/status-processing.svg')}}">
                        <p class="h-100 mt-4 ms-2" style="font-weight: 600 ; font-size: 16px">{{count($orders)}} جاری</p>
                    </a>
                    <a href="{{route('user.panel.order.sent')}}" class="d-flex text-dark"  style="text-decoration: none">
                        <img src="{{url('images/userPanel/status-delivered.svg')}}">
                        <p class="h-100 mt-4 ms-2" style="font-weight: 600 ; font-size: 16px"> {{count($orders_sent)}} تحویل شده  </p>
                    </a>
                    <a href="{{route('user.panel.order.canceled')}}" class="d-flex text-dark"  style="text-decoration: none">
                        <img src="{{url('images/userPanel/status-returned.svg')}}">
                        <p class="h-100 mt-4 ms-2" style="font-weight: 600 ; font-size: 16px">{{count($orders_canceled)}} لغو شده</p>
                    </a>
                </div>
            </div>


            @yield('center')


        </div>
    </div>
</div>


@endsection
@vite(['resources/js/user_panel.js'])
