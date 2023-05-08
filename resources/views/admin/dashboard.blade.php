@extends('admin.admin_app')


@section('admin')

    <div class="w-100 py-5">

        <div class="row ">
            <div class="col-12 col-md-6 ">
                <div class="h5 py-1 text-center text-light opacity-50">تنوع‌ها</div>
                <div class="m-auto d-flex border border-danger shadow" style="width: 95% ; height: 200px ; border-radius: 10px ; background-color: #2a2a2a">
                    <div class="d-flex" style="width: 60%">
                        <div class="d-flex flex-column py-1 px-2 opacity-25" style="width: 60%">
                            <div class="w-100 h-100 h5 "> فعال  </div>
                            <div class="w-100 h-100 h5 "> غیر فعال   </div>
                            <div class="w-100 h-100 h5 "> ناموجود   </div>
                            <div class="w-100 h-100 h5 "> موجود   </div>
                            <div class="w-100 h-100 h5 "> شگفت‌انگیز   </div>
                        </div>
                        <div class="d-flex flex-column py-1 px-2 opacity-50" style="width: 40%">
                            <div class="w-100 h-100 h5 "> {{$varActive}}  </div>
                            <div class="w-100 h-100 h5 "> {{$varDeActive}}  </div>
                            <div class="w-100 h-100 h5 "> {{$varRemainOff}}  </div>
                            <div class="w-100 h-100 h5 "> {{$varRemain}}  </div>
                            <div class="w-100 h-100 h5 "> {{$varSpecial}}  </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                        <div class="h1 shadow border border-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 100px ; height: 100px">{{$varCount}}</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 ">
                <div class="h5 py-1 text-center text-light opacity-50">فروش</div>
                <div class="m-auto d-flex border border-danger shadow" style="width: 95% ; height: 200px ; border-radius: 10px ; background-color: #2a2a2a">
                    <div class="d-flex" style="width: 60%">
                        <div class="d-flex flex-column py-2 px-2 opacity-25" style="width: 35%">
                            <div class="w-100 h-100 h5 "> دیروز  </div>
                            <div class="w-100 h-100 h5 "> هفته   </div>
                            <div class="w-100 h-100 h5 "> ماه   </div>
                            <div class="w-100 h-100 h5 "> سال   </div>
                        </div>
                        <div class=" d-flex flex-column py-2 px-2 opacity-50" style="width: 65%">
                            <div class="w-100 h-100 h5 d-flex "> {{number_format($sellDay)}} <p class="mt-1 me-2" style="font-size: 12px">ریال</p> </div>
                            <div class="w-100 h-100 h5 d-flex "> {{number_format($sellweek)}} <p class="mt-1 me-2" style="font-size: 12px">ریال</p>  </div>
                            <div class="w-100 h-100 h5 d-flex "> {{number_format($sellMonth)}} <p class="mt-1 me-2" style="font-size: 12px">ریال</p>  </div>
                            <div class="w-100 h-100 h5 d-flex "> {{number_format($sellYear)}} <p class="mt-1 me-2" style="font-size: 12px">ریال</p>  </div>

                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                        <div class="h3 shadow border border-danger  d-flex align-items-center justify-content-center p-2 rounded-3" style=" transform: rotate(270deg)">{{number_format($sellAll)}}</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5">

            <div class="col-12 col-md-4">
                <div class="h5 py-1 text-center text-light opacity-50">سفارشات </div>
                <div class="m-auto d-flex border border-danger shadow" style="width: 95% ; height: 200px ; border-radius: 10px ; background-color: #2a2a2a">
                    <div class="d-flex" style="width: 65%">
                        <div class="d-flex flex-column py-3 px-2 opacity-25" style="width: 50%">
                            <div class="w-100 h-100 h5 "> جاری  </div>
                            <div class="w-100 h-100 h5 "> تحویل   </div>
                            <div class="w-100 h-100 h5 "> لغو   </div>
                        </div>
                        <div class=" d-flex flex-column py-3 px-2 opacity-50" style="width: 50%">
                            <div class="w-100 h-100 h5 d-flex "> {{$orNow}}</div>
                            <div class="w-100 h-100 h5 d-flex "> {{$orSent}} </div>
                            <div class="w-100 h-100 h5 d-flex "> {{$orCancel}} </div>

                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="width: 35%">
                        <div class="h1 shadow border border-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 80px ; height: 80px">{{$orCount}}</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 ">
                <div class="h5 py-1 text-center text-light opacity-50">محصولات</div>
                <div class="m-auto d-flex border border-danger shadow" style="width: 95% ; height: 200px ; border-radius: 10px ; background-color: #2a2a2a">
                    <div class="d-flex" style="width: 65%">
                        <div class="d-flex flex-column py-3 px-2 opacity-25" style="width: 60%">
                            <div class="w-100 h-100 h5 mt-3"> فعال  </div>
                            <div class="w-100 h-100 h5 "> غیر‌فعال   </div>
                        </div>
                        <div class=" d-flex flex-column py-3 px-2 opacity-50" style="width: 40%">
                            <div class="w-100 h-100 h5 d-flex  mt-3"> {{$proActive}}  </div>
                            <div class="w-100 h-100 h5 d-flex "> {{$proDeActive}}   </div>

                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="width: 35%">
                        <div class="h1 shadow border border-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 80px ; height: 80px">{{$proActive + $proDeActive}}</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 ">
                <div class="h5 py-1 text-center text-light opacity-50">کاربران</div>
                <div class="m-auto d-flex border border-danger shadow" style="width: 95% ; height: 200px ; border-radius: 10px ; background-color: #2a2a2a">
                    <div class="d-flex" style="width: 65%">
                        <div class="d-flex flex-column py-3 px-2 opacity-25" style="width: 60%">
                            <div class="w-100 h-100 h5 "> فعال  </div>
                            <div class="w-100 h-100 h5 "> غیر‌فعال   </div>
                            <div class="w-100 h-100 h5 "> فروشنده   </div>
                        </div>
                        <div class=" d-flex flex-column py-3 px-2 opacity-50" style="width: 40%">
                            <div class="w-100 h-100 h5 d-flex "> {{$useActive}}  </div>
                            <div class="w-100 h-100 h5 d-flex "> {{$useDeActive}}   </div>
                            <div class="w-100 h-100 h5 d-flex "> {{$useSeller}}   </div>

                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="width: 35%">
                        <div class="h1 shadow border border-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 80px ; height: 80px">{{$useActive + $useDeActive}}</div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
@vite(['resources/js/admin/products/create.js'])
