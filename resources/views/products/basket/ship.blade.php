@extends('layouts.app')
@vite(['resources/css/basket.css'])
@section('main')


    <div class="w-100  mt-4">
        <form method="post" action="{{route('basket.complete')}}" class="d-flex w-100 flex-column">
            @csrf
        <div class="basket-box m-auto">
            <div class="basket-box-products position-relative" >
                <div class="border m-auto overflow-hidden p-3" style="width: 98% ; border-radius: 15px  ; min-height: 400px">



                        <h5>آدرس:</h5>
                        <input value="{{auth()->user()->address != '' ? auth()->user()->address : ''}}" style="outline: none" type="text" name="address" class="input-group-text mt-2 text-start bg-white w-100" placeholder="تهران .......">
                        <hr/>

                        <h5 class="mt-4">تلفن:</h5>
                        <input value="{{auth()->user()->phone != '' ? auth()->user()->phone : ''}}" style="outline: none" type="text" name="phone" class="input-group-text mt-2 text-start bg-white w-100" placeholder="09xxxxxxxxx">
                        <hr/>

                    <h5 class="mt-4">روش پرداخت:</h5>
                    <div style="width: 120px " class="d-flex align-items-center justify-content-between py-2">
                    <input disabled type="radio" name="phone" class="input-group-text mt-2 text-start bg-white" placeholder="09xxxxxxxxx">
                        پرداخت آنلاین
                    </div>
                    <div style="width: 120px " class="d-flex align-items-center justify-content-between py-2">
                        <input value="offline"  type="radio" name="pay" class="input-group-text mt-2 text-start">
                        پرداخت در محل
                    </div>
                    <hr/>

                        <h5 class="mt-4">انتخاب زمان:</h5>
                        <div class="d-flex align-items-center justify-content-around mt-4">
                            <select class="form-select w-25 text-center " name="date" style="cursor: pointer;">
                                <option value="" selected class="">روز....</option>
                                @for($v = $shippingTimeMax; $v < $shippingTimeMax+8 ; $v++)
                                    @if(verta(+$v.'day' , 'iran')->dayOfWeek != 6)
                                    <option value="{{\Carbon\Carbon::now()->addDays($v)}}" class="">{{verta(+$v.'day' , 'iran')->formatWord('l')}} ---  {{verta(+$v.'day' , 'iran')->year}}/{{verta(+$v.'day' , 'iran')->month}}/{{verta(+$v.'day' , 'iran')->day}}</option>
                                    @endif
                                @endfor
                            </select>

                            <select class="form-select w-25 text-center" name="time" style="cursor: pointer;">
                                @php
                                    $time = 3;
                                @endphp
                                <option value="" selected>ساعت....</option>
                                <option value="9 - 12" class="">9 - 12</option>
                                <option value="12 - 15" class="">12 - 15</option>
                                <option value="15 - 18" class="">15 - 18</option>
                                <option value="18 - 21" class="">18 - 21</option>
                            </select>
                        </div>



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

                                @if($value['number'] <= $item->number)
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

                        <div class="d-flex align-items-center justify-content-between basket-box-sumBuy-into-FirstChils-1" style="font-weight: 700">
                            <div class="">جمع سبد خرید</div>
                            <div class="mt-2">
                                {{number_format($sunPrideOff/10) }}
                                @php
                                    echo file_get_contents('images/toman.svg');
                                @endphp
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between basket-box-sumBuy-into-FirstChils-1" style="font-weight: 700">
                            <div class="">هزینه ارسال</div>
                            <div class="mt-2">
                                @if($sunPrideOff >= 10000000)
                                    {{number_format($sending = 0) }}
                                @else
                                    {{number_format($sending = 30000) }}
                                @endif
                                @php
                                    echo file_get_contents('images/toman.svg');
                                @endphp
                            </div>
                        </div>

                        @if($sunPrideOff != $sumPrice)

                            <div class="d-flex align-items-center justify-content-between  text-danger basket-box-sumBuy-into-FirstChils-1" style="font-weight: 700">
                                <div class="">مبلغ نهایی</div>
                                <div class="mt-2">
                                    {{number_format(($sunPrideOff/10)-$sending) }}
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
                            <button class="btn-danger w-100 py-3 bg-danger d-block rounded-3 text-white text-center h5 mt-4" style="border: none"> ادامه</button>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        </form>

    </div>

    @if(isset($modal))

        <!-- Button trigger modal -->
        <div class="ppp position-absolute" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        </div>



        <!-- Modal -->
        <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class=" h4 text-center py-5">
                        سفارش شما با موفقیت ثبت شد
                    </div>
                    <div class="py-5 m-auto">
                        <a href="{{route('home')}}" class="btn btn-light border me-5">بازگشت به سایت</a>
                        <a href="{{route('user.panel.order')}}"  class="btn btn-success border border-success border-2">سفارشات</a>
                    </div>
                </div>
            </div>
        </div>


        <script>
            window.onload = function (){
                let ppp = document.querySelector('.ppp');
                ppp.click();
            }
        </script>


    @endif






    @if(count($errors) > 0)
        @foreach($errors->all() as $eror)
            {{$eror}}
        @endforeach
    @endif




    <div class="w-100 fakeUnderBasket"></div>



@endsection

@vite(['resources/js/basket.js'])
