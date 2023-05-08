<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
    @vite(['resources/css/bootstrap.rtl.min.css','resources/css/font.css' , 'resources/css/admin/admin_app.css'])

</head>
<body dir="rtl" style="background-color: #515151;" >



<div class="w-100 bg-dark shadow text-light py-2 px-4 text-center position-fixed border-bottom border-dark d-flex align-items-center justify-content-between " style=" font-size: 30px ; z-index: 9999">
    <i class="bi-list h2 adminListIcon" style="display: none ; cursor: pointer"></i>
    {{auth()->user()->seller_name}}
</div>

<div class="bg-dark opacity-50 position-fixed adminMenuFake" style="width: 100vw ; height: 100vh ; z-index: 9; display: none"></div>

<div class="w-100 ">
    <div class="admin-box m-auto d-flex">

        <div class="mt-5 d-flex w-100">

            <div class="admin-box-meno pb-3">
                <div class="border-dark border m-auto shadow admin-box-meno-child">
                    <i class="bi-x-lg h5 position-absolute text-secondary admin-box-meno-child-close" style="left: 10px ; top: 5px ; display: none; cursor: pointer"></i>

                    <div class="m-auto w-100 d-flex align-items-center justify-content-center py-3">
                        @php
                            echo file_get_contents('image/logo.svg');
                        @endphp
                    </div>

                    <a href="{{route('home')}}" class="d-flex text-light w-100 p-2 hover align-items-center justify-content-start" style="text-decoration: none ; height: 40px">
                        <i class="bi-arrow-right h5 mt-2"></i>
                        <div class="ms-2" style="font-size: 15px">بازگشت به سایت</div>
                    </a>

                    <a href="{{route('seller.dashboard')}}" class="d-flex {{request()->path() == 'seller/dashboard' ? 'text-danger' : 'text-light'}}  w-100 p-2 hover align-items-center justify-content-start" style="text-decoration: none ; height: 40px">
                        <i class="bi-card-checklist h5 mt-2"></i>
                        <div class="ms-2" style="font-size: 15px">داشبورد</div>
                    </a>




                    <div class="w-100 admin-box-meno-child-list  ">


                        <div class="accordion bg-transparent text-light" id="accordionExample">

                            <a href="{{route('seller.products')}}" class="d-flex {{request()->path() == 'seller/products' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-layers h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">مدیریت محصولات</div>
                            </a>

                            <a href="{{route('seller.varieties')}}" class="d-flex {{request()->path() == 'seller/varieties' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-x-diamond h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">مدیریت تنوع‌</div>
                            </a>


                            <a href="{{route('seller.orders')}}" class="d-flex {{request()->path() == 'seller/orders' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-cart3 h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">سفارشات</div>
                            </a>

                            <a href="{{route('seller.massages')}}" class="d-flex position-relative  {{request()->path() == 'seller/massages' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-envelope h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">پیام‌ها</div>
                                @if(count($massagesSeen) > 0)
                                    <div class="bg-danger rounded-circle position-absolute" style="width: 10px ;height: 10px ; top: 40% ; left: 120px"></div>
                                @endif
                            </a>

                        </div>


                    </div>









                </div>
            </div>


            <div class="admin-box-data py-4 m-auto text-light">
                <div class="w-100  border-dark border shadow overflow-hidden" style=" border-radius: 15px ; background-color: #373737 ; min-height: 627px ">
                    @yield('seller')
                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/admin/admin_app.js'])
</body>
</html>



