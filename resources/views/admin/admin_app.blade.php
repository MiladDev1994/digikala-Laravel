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
    کنترل پنل
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

                    <a href="{{route('admin.dashboard')}}" class="d-flex {{request()->path() == 'admin/dashboard' ? 'text-danger' : 'text-light'}}  w-100 p-2 hover align-items-center justify-content-start" style="text-decoration: none ; height: 40px">
                        <i class="bi-card-checklist h5 mt-2"></i>
                        <div class="ms-2" style="font-size: 15px">داشبورد</div>
                    </a>




                    <div class="w-100 admin-box-meno-child-list  ">





                        <div class="accordion bg-transparent text-light" id="accordionExample">

                            <div class="accordion-item bg-transparent border-0">
                                <div style="height: 40px" class="accordion-button bg-transparent {{request()->path() == 'admin/home/banner' || request()->path() == 'admin/home/slider' || request()->path() == 'admin/home/articles' ? 'show text-danger' : 'text-light'}} px-2 hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="bi-house h5 me-2 mt-2"></i>
                                    خانه
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse {{request()->path() == 'admin/home/banner' || request()->path() == 'admin/home/slider' || request()->path() == 'admin/home/articles' ? 'show' : ''}}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <a href="{{route('admin.home.banner')}}" class="py-2 bg-dark w-100 text-center hover d-block  {{request()->path() == 'admin/home/banner' ? 'text-danger' : 'text-light'}}" style="text-decoration: none">بنرها</a>
                                    <a href="{{route('admin.home.slider')}}"  class="py-2 bg-dark w-100 text-center hover d-block  {{request()->path() == 'admin/home/slider' ? 'text-danger' : 'text-light'}}" style="text-decoration: none">اسلایدر</a>
                                    <a href="{{route('admin.home.articles')}}"  class="py-2 bg-dark w-100 text-center hover d-block {{request()->path() == 'admin/home/articles' ? 'text-danger' : 'text-light'}}" style="text-decoration: none">مقالات</a>
                                </div>
                            </div>

                            <a href="{{route('admin.products')}}" class="d-flex {{request()->path() == 'admin/products' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-layers h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">مدیریت محصولات</div>
                            </a>

                            <a href="{{route('admin.varieties')}}" class="d-flex {{request()->path() == 'admin/varieties' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-x-diamond h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">مدیریت تنوع‌</div>
                            </a>


                            <a href="{{route('admin.categories')}}" class="d-flex {{request()->path() == 'admin/categories' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-stack h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">دسته‌بندی‌ها</div>
                            </a>

                            <a href="{{route('admin.orders')}}" class="d-flex {{request()->path() == 'admin/orders' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-cart3 h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">سفارشات</div>
                            </a>

                            <a href="{{route('admin.users')}}" class="d-flex {{request()->path() == 'admin/users' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-people h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">کاربران</div>
                            </a>


                            <div class="accordion-item bg-transparent border-0">
                                <div style="height: 40px" class="accordion-button bg-transparent  px-2 hover {{request()->path() == 'admin/variations/color' || request()->path() == 'admin/variations/size' || request()->path() == 'admin/variations/volume' || request()->path() == 'admin/variations/weight' || request()->path() == 'admin/variations/num' ? 'text-danger' : 'text-light'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                    <i class="bi-sliders2 h5 me-2 mt-2"></i>
                                    متغییر‌ها
                                </div>
                                <div id="collapse4" class="accordion-collapse collapse {{request()->path() == 'admin/variations/color' || request()->path() == 'admin/variations/size' || request()->path() == 'admin/variations/volume' || request()->path() == 'admin/variations/weight' || request()->path() == 'admin/variations/num' ? 'show' : ''}}" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                    <a  href="{{route('admin.variations.color')}}" class="py-2 bg-dark w-100 text-center hover d-block  {{request()->path() == 'admin/variations/color' ? 'text-danger' : 'text-light'}}" style="text-decoration: none" >رنگ</a>
                                    <a  href="{{route('admin.variations.size')}}" class="py-2 bg-dark w-100 text-center hover d-block  {{request()->path() == 'admin/variations/size' ? 'text-danger' : 'text-light'}}" style="text-decoration: none" >سایز</a>
                                    <a  href="{{route('admin.variations.volume')}}" class="py-2 bg-dark w-100 text-center hover d-block  {{request()->path() == 'admin/variations/volume' ? 'text-danger' : 'text-light'}}" style="text-decoration: none" >حجم</a>
                                    <a  href="{{route('admin.variations.weight')}}" class="py-2 bg-dark w-100 text-center hover d-block  {{request()->path() == 'admin/variations/weight' ? 'text-danger' : 'text-light'}}" style="text-decoration: none" >وزن</a>
                                    <a  href="{{route('admin.variations.num')}}" class="py-2 bg-dark w-100 text-center hover d-block  {{request()->path() == 'admin/variations/num' ? 'text-danger' : 'text-light'}}" style="text-decoration: none" >تعداد</a>
                                </div>
                            </div>


                            <a href="{{route('admin.brands')}}" class="d-flex  {{request()->path() == 'admin/brands' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-shield h5 me-2 mt-2 py-1"></i>
                                <div class="py-2"> برند‌ها</div>
                            </a>

                            <a href="{{route('admin.warranties')}}" class="d-flex {{request()->path() == 'admin/warranties' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-plus-circle h5 me-2 mt-2 py-1"></i>
                                <div class="py-2"> گارانتی‌ها</div>
                            </a>


                            <a href="{{route('admin.requests')}}" class="d-flex {{request()->path() == 'admin/requests' ? 'text-danger' : 'text-light'}} px-2 hover position-relative" style=" text-decoration: none">
                                <i class="bi-envelope h5 me-2 mt-2 py-1"></i>
                                <div class="py-2">درخواست‌ها</div>
                                @if($countRequest > 0)
                                    <div class="bg-danger position-absolute rounded-circle" style="width: 10px ; height: 10px ; top: 40% ; left: 40%"></div>
                                @endif
                            </a>

                            <a href="{{route('admin.comments')}}" class="d-flex {{request()->path() == 'admin/comments' ? 'text-danger' : 'text-light'}} px-2 hover" style=" text-decoration: none">
                                <i class="bi-chat-dots h5 me-2 mt-2"></i>
                                <div class="py-2">کامنت‌ها</div>
                            </a>



                        </div>


                    </div>









                </div>
            </div>


            <div class="admin-box-data py-4 m-auto text-light">
                <div class="w-100  border-dark border shadow overflow-hidden" style=" border-radius: 15px ; background-color: #373737 ; min-height: 627px ">
                    @yield('admin')
                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/admin/admin_app.js'])
</body>
</html>



