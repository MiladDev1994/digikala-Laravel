@extends('seller.seller_app')
@section('seller')
    <style>
        .addVar:hover{
            color: #ff7e7e !important;
            transition: 0.3s;
            cursor: pointer;
        }
    </style>
<h4 class="text-center opacity-50 py-2">افزودن تنوع </h4>


@if($product->variety_type === "null" && count($variety) > 0)
    <div class="w-100 d-flex align-items-center justify-content-center text-center text-secondary opacity-50" style="height: 560px ; font-size: 50px ">قبلا تنوع ایجاد کرده‌اید!</div>
@else



<form method="post" action="{{route('seller.products.addVar.store' , $product->id)}}" enctype="multipart/form-data" class="p-3">
    @csrf
    @method('post')




<div class="w-100 border border-dark mt-4 p-3 {{$product->variety_type == "null" ? 'd-none' : 'd-block'}} position-relative" style="border-radius: 15px">
    @if($product->variety_type == "color")
        @foreach($colors as $color)
            @if(!in_array($color->id , $variety))
                <div class="d-inline-block">
                    <div class=" btn btn-dark p-0 ms-2 p-1 d-flex align-items-center justify-content-between px-2 mt-2 m-auto shadow position-relative" style="width: 130px">
                        <div class="rounded-3" style="width: 25px ; height: 25px ; background-color: {{$color->color}}"></div>
                        <div class="rounded-3 opacity-50">{{$color->name}}</div>
                        <input name="variety" value="{{$color->id}}" type="radio" class=" form-check-input h1 p-0 position-absolute opacity-0 color{{$color->id}}" style="width: 100% ; right: 0 ; cursor: pointer">
                    </div>
                </div>
                <script>
                    let color{{$color->id}} = document.querySelector('.color{{$color->id}}');
                    color{{$color->id}}.addEventListener('click', function (e){
                        let colorChild = e.target.parentNode.parentNode.parentNode.childNodes;
                        for (i = 0 ; i < colorChild.length ; i++){
                            if (i % 2 === 1){
                                colorChild[i].style.opacity = '100%';
                            }
                        }
                        e.target.parentNode.parentNode.style.opacity = '50%';
                    })
                </script>
            @endif
        @endforeach
            <a href="{{route('seller.request.variety' , $product->id) }}" target="_blank"  class="position-absolute text-info addVar" style="bottom:  -25px; right: 25px ; font-size: 13px ; text-decoration: none">افزودن رنگ</a>
    @elseif($product->variety_type == "size")
        @foreach($sizes as $size)
            @if(!in_array($size->id , $variety))
                <div class="d-inline-block">
                    <div class=" btn btn-dark p-0 ms-2 p-1 d-flex align-items-center justify-content-center px-2 mt-2 m-auto shadow position-relative" style="width: 130px">
                        <div class="rounded-3 opacity-50">{{$size->size}}</div>
                        <input name="variety" value="{{$size->id}}" type="radio" class=" form-check-input h1 p-0 position-absolute opacity-0 size{{$size->id}}" style="width: 100% ; right: 0 ; cursor: pointer">
                    </div>
                </div>
                <script>
                    let size{{$size->id}} = document.querySelector('.size{{$size->id}}');
                    size{{$size->id}}.addEventListener('click', function (e){
                        let sizeChild = e.target.parentNode.parentNode.parentNode.childNodes;
                        for (i = 0 ; i < sizeChild.length ; i++){
                            if (i % 2 === 1){
                                sizeChild[i].style.opacity = '100%';
                            }
                        }
                        e.target.parentNode.parentNode.style.opacity = '50%';
                    })
                </script>
            @endif
        @endforeach
            <a href="{{route('seller.request.variety' , $product->id)}}" target="_blank"  class="position-absolute text-info addVar" style="bottom:  -25px; right: 25px ; font-size: 13px ; text-decoration: none">افزودن سایز</a>
    @elseif($product->variety_type == "Weight")
        @foreach($weights as $weight)
            @if(!in_array($weight->id , $variety))
                <div class="d-inline-block">
                    <div class=" btn btn-dark p-0 ms-2 p-1 d-flex align-items-center justify-content-center px-2 mt-2 m-auto shadow position-relative" style="width: 130px">
                        <div class="rounded-3 opacity-50">{{$weight->weight}}</div>
                        <input name="variety" value="{{$weight->id}}" type="radio" class=" form-check-input h1 p-0 position-absolute opacity-0 weight{{$weight->id}}" style="width: 100% ; right: 0 ; cursor: pointer">
                    </div>
                </div>
                <script>
                    let weight{{$weight->id}} = document.querySelector('.weight{{$weight->id}}');
                    weight{{$weight->id}}.addEventListener('click', function (e){
                        let weightChild = e.target.parentNode.parentNode.parentNode.childNodes;
                        for (i = 0 ; i < weightChild.length ; i++){
                            if (i % 2 === 1){
                                weightChild[i].style.opacity = '100%';
                            }
                        }
                        e.target.parentNode.parentNode.style.opacity = '50%';
                    })
                </script>
            @endif
        @endforeach
            <a  href="{{route('seller.request.variety' , $product->id)}}" target="_blank"  class="position-absolute text-info addVar" style="bottom:  -25px; right: 25px ; font-size: 13px ; text-decoration: none">افزودن وزن</a>
    @elseif($product->variety_type == "volume")
        @foreach($volumes as $volume)
            @if(!in_array($volume->id , $variety))
                <div class="d-inline-block">
                    <div class=" btn btn-dark p-0 ms-2 p-1 d-flex align-items-center justify-content-center px-2 mt-2 m-auto shadow position-relative" style="width: 130px">
                        <div class="rounded-3 opacity-50">{{$volume->volume}}</div>
                        <input name="variety" value="{{$volume->id}}" type="radio" class=" form-check-input h1 p-0 position-absolute opacity-0 volume{{$volume->id}}" style="width: 100% ; right: 0 ; cursor: pointer">
                    </div>
                </div>
                <script>
                    let volume{{$volume->id}} = document.querySelector('.volume{{$volume->id}}');
                    volume{{$volume->id}}.addEventListener('click', function (e){
                        let volumeChild = e.target.parentNode.parentNode.parentNode.childNodes;
                        for (i = 0 ; i < volumeChild.length ; i++){
                            if (i % 2 === 1){
                                volumeChild[i].style.opacity = '100%';
                            }
                        }
                        e.target.parentNode.parentNode.style.opacity = '50%';
                    })
                </script>
            @endif
        @endforeach
            <a href="{{route('seller.request.variety' , $product->id)}}" target="_blank"  class="position-absolute text-info addVar" style="bottom:  -25px; right: 25px ; font-size: 13px ; text-decoration: none">افزودن حجم</a>
    @elseif($product->variety_type == "number")
        @foreach($numbers as $number)
            @if(!in_array($number->id , $variety))
                <div class="d-inline-block">
                    <div class=" btn btn-dark p-0 ms-2 p-1 d-flex align-items-center justify-content-center px-2 mt-2 m-auto shadow position-relative" style="width: 130px">
                        <div class="rounded-3 opacity-50">{{$number->number}}</div>
                        <input name="variety" value="{{$number->id}}" type="radio" class=" form-check-input h1 p-0 position-absolute opacity-0 number{{$number->id}}" style="width: 100% ; right: 0 ; cursor: pointer">
                    </div>
                </div>
                <script>
                    let number{{$number->id}} = document.querySelector('.number{{$number->id}}');
                    number{{$number->id}}.addEventListener('click', function (e){
                        let numberChild = e.target.parentNode.parentNode.parentNode.childNodes;
                        for (i = 0 ; i < numberChild.length ; i++){
                            if (i % 2 === 1){
                                numberChild[i].style.opacity = '100%';
                            }
                        }
                        e.target.parentNode.parentNode.style.opacity = '50%';
                    })
                </script>
            @endif
        @endforeach
            <a href="{{route('seller.request.variety' , $product->id)}}" target="_blank"  class="position-absolute text-info addVar" style="bottom:  -25px; right: 25px ; font-size: 13px ; text-decoration: none">افزودن تعداد</a>
    @elseif($product->variety_type == "null")
        <input type="checkbox" checked value="0" class="position-absolute opacity-0" name="variety" style="left: 10px ; top: 10px">
    @endif

</div>
    @error('variety') <div class="text-danger text-end" style="font-size: 12px">لطفا تنوع را انتخاب کنید</div> @enderror




    <div class="row mt-4">
        <div class="col-12 col-md-5 py-2">
            <select name="Warranty"  class="form-select bg-dark text-light text-center shadow" style="border: none ; outline: none">
                @foreach($Warrantys as $Warranty)
                    <option {{$Warranty->id == 7 ? 'selected' : ''}} value="{{$Warranty->id}}"> گارانتی {{$Warranty->period}} {{$Warranty->name}}</option>
                @endforeach
            </select>
            <a class="text-info addVar d-block px-4 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModalWar" style="font-size: 13px ; text-decoration: none">درخواست افزودن گارانتی</a>

        </div>
        <div class="col-4 col-md-3 py-2">
            <select name="ship" class="form-select bg-dark text-light text-center shadow" style="border: none ; outline: none">
                <option selected value="1">ارسال یک روزه</option>
                <option value="2"> ارسال دو روزه</option>
                <option value="3"> ارسال سه روزه</option>
                <option value="4"> ارسال چهار روزه</option>
                <option value="5">ارسال پنج روزه</option>
            </select>
        </div>
        <div class="col-4 col-md-2 py-2 d-flex align-items-center justify-content-center">

        </div>
        <div class="col-4 col-md-2 py-2 d-flex align-items-center justify-content-center">

        </div>
    </div>




    <div class="row">
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center py-2 position-relative">
            <div class="px-1 w-100 position-relative">
                <div class="bg-secondary position-absolute rounded-3 priceOver  align-items-center justify-content-center  px-5" style="width: 98% ; height: 30px ; top: -33px ; display: none">
                    <div class="w-75  showPrice text-light"></div>
                    <div class="w-25 text-light">ریال</div>
                </div>
                <input type="text" name="price" class="input-group-text bg-dark text-center text-light w-100 price" placeholder="قیمت" style="border: none ; outline: none">
                @error('price') <div class="text-danger text-end position-absolute" style="font-size: 12px">لطفا قیمت را وارد کنید</div> @enderror
            </div>
            <div class="px-1 w-100">
                <div class="bg-secondary position-absolute rounded-3 priceOffOver  align-items-center justify-content-center  px-5" style="width: 47% ; height: 30px ; top: -20px ; display: none">
                    <div class="w-75  showPriceOff text-light"></div>
                    <div class="w-25 text-light">ریال</div>
                </div>
                <input type="text" name="price_off" class="input-group-text bg-dark text-center text-light w-100 priceOff" placeholder="تخفیف" style="border: none ; outline: none">
            </div>
        </div>

        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center py-2">
            <div class="px-1 w-100 position-relative">
                <input type="text" name="number" class="input-group-text bg-dark text-center text-light w-100" placeholder="تعداد" style="border: none ; outline: none">
                @error('number') <div class="text-danger text-end position-absolute" style="font-size: 12px">لطفا تعداد را وارد کنید</div> @enderror
            </div>
            <div class="px-1 w-100 d-flex align-items-center justify-content-center">
                <p class="opacity-50 mt-2"> فعال</p>
                <input type="checkbox" name="active" class="form-check-input bg-dark  h3 ms-2" style="border: none ; outline: none">
            </div>
        </div>
    </div>



    <select name="categories[]" multiple style="display: none">
        @foreach($product->Ccategories as $item)
            <option selected value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <input type="hidden" name="brand" value="{{$product->brand_id}}">
    <input type="hidden" name="dkp" value="{{$product->dkp}}">



    <button class="mt-5 m-auto d-block btn btn-success"> ایجاد </button>


</form>


<script>
    let price = document.querySelector('.price');
    let showPrice = document.querySelector('.showPrice');
    let priceOver = document.querySelector('.priceOver');
    price.addEventListener('keyup' , function (e){
        let priceArray = [];
        let pricethree = 0 ;
        for (i=e.target.value.length-1 ; i>-1 ; i--){
            pricethree += 1;
            priceArray.unshift(e.target.value[i]) ;
            if (pricethree % 3 === 0){
                priceArray.unshift(',') ;
            }
        }
        if (priceArray[0] === ','){
            priceArray.shift();
        }
        let priceLast = '';
        for (j=0 ; j<priceArray.length ; j++){
            priceLast += priceArray[j];
        }
        showPrice.innerText = priceLast;
    })
    price.addEventListener('mouseover' , function (){
        priceOver.style.display = 'flex';
    })
    price.addEventListener('mouseout' , function (){
        priceOver.style.display = 'none';
    })



    let priceOff = document.querySelector('.priceOff');
    let showpriceOff = document.querySelector('.showpriceOff');
    let priceOffOver = document.querySelector('.priceOffOver');
    priceOff.addEventListener('keyup' , function (e){
        let priceOffArray = [];
        let priceOffthree = 0 ;
        for (i=e.target.value.length-1 ; i>-1 ; i--){
            priceOffthree += 1;
            priceOffArray.unshift(e.target.value[i]) ;
            if (priceOffthree % 3 === 0){
                priceOffArray.unshift(',') ;
            }
        }
        if (priceOffArray[0] === ','){
            priceOffArray.shift();
        }
        let priceOffLast = '';
        for (j=0 ; j<priceOffArray.length ; j++){
            priceOffLast += priceOffArray[j];
        }
        showpriceOff.innerText = priceOffLast;
    })
    priceOff.addEventListener('mouseover' , function (){
        priceOffOver.style.display = 'flex';
    })
    priceOff.addEventListener('mouseout' , function (){
        priceOffOver.style.display = 'none';
    })

</script>
@endif


    <div class="modal fade" id="exampleModalWar" tabindex="-1" aria-labelledby="exampleModalLabelWar" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 100px">
            <div class="modal-content  position-relative" style="height: 200px ; background-color: #3a3a3a">

                <div class="modal-body mt-5">
                    <form class="" method="post" action="{{route('seller.request.warranty')}}" enctype="multipart/form-data">
                        @csrf
                        <input name="warranty" type="text" class="input-group-text bg-dark w-100 text-light shadow" placeholder="عنوان گارانتی به همراه مدت...." style="border: none ; outline: none" >
                        <input name="logo" type="file" class=" w-100 text-light py-4" style="border: none ; outline: none" >
                        <button type="submit" class="btn btn-success m-auto d-block mt-5">ارسال</button>
                    </form>
                </div>
                <button type="button" class="btn text-light bi-x-lg position-absolute" data-bs-dismiss="modal" style="left: 5px ; top: 5px"></button>
            </div>
        </div>
    </div>



@endsection
@vite(['resources/js/admin/products/create.js'])
