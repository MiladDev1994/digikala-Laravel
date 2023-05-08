@extends('user.index')
@section('center')

    <div class="user-box-left-too-downBox w-100 border mt-2 py-3">
        <div class="w-100 mt-4">
            <div class="kala-Similar m-auto   position-relative">
                <i class="kala-Similar-btnLeft bi-chevron-left position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
                <div class="w-100 kala-Similar-Box position-relative overflow-hidden">
                    @php
                        $marginRight = -185;
                        $child = 0;
                        $Sproducts = 0;
                    @endphp
                    @foreach($varietiesFavorite as $variety)
                        @php
                            $images = explode(',' ,$variety->products->image);
                            $Sproducts += 1;
                        @endphp
                        <a target="_blank" class="Sproducts{{$Sproducts}} kala-Similar-Box-var overflow-hidden me-1 border-start" style="right: {{$marginRight+=185}}px ; text-decoration: none">
                            <div class="p-2 d-flex align-items-start justify-content-center" style="width: 100% ; height: 180px">
                                <div class="" style="width: 90% ; height: 90% ; background-image: url('{{url('images/'.$images[0])}}'); background-size: cover ; background-position: center"></div>
                            </div>
                            <div class="bg-white px-2 text-end" style="width: 100% ; height: 60px ">
                                <div class="w-100 d-flex align-items-center  {{$variety->price_off != $variety->price ? 'justify-content-around' : 'justify-content-end'}}">
                                    @if($variety->price_off != $variety->price)
                                        <b style="font-size: 13px" class="text-white bg-danger px-2 rounded-pill">{{(round(1-($variety->price_off/$variety->price) , 2)*100).'%'  }}</b>
                                    @endif
                                    <div class="">
                                        <b class="text-dark" style="font-size: 15px">{{number_format($variety->price_off/10) }}</b>
                                        @php
                                            echo file_get_contents('images/toman.svg');
                                        @endphp
                                    </div>
                                </div>
                                <div class="w-100 d-flex align-items-center {{$variety->price_off != $variety->price ? 'justify-content-around' : 'justify-content-start px-2'}} text-dark" style="font-size: 12 ; height: 40px">
                                    @if($variety->product->variety_type == 'color')
                                        <div class="shadow" style="width: 10px ; height: 10px ; border-radius: 50% ; background-color: {{$variety->color->color}}"></div>
                                    @endif
                                    @if($variety->product->variety_type == 'size')
                                        <div class=" px-2 rounded-pill" style="background-color: #f4e8e8">
                                            {{$variety->size->size}}
                                        </div>
                                    @endif
                                    @if($variety->price_off != $variety->price)
                                        <p class="text-secondary mt-2 text-center" style="font-size: 13px ; text-decoration: line-through ; text-decoration-color: #b0b0b0">{{number_format($variety->price/10) }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                        <script>
                            if(window.navigator.userAgent.indexOf("Chrome") > 0){
                                let Sproducts{{$Sproducts}} = document.querySelector('.Sproducts{{$Sproducts}}');
                                Sproducts{{$Sproducts}}.addEventListener('mousedown' , function (e){
                                    Sproducts{{$Sproducts}}.setAttribute('href' , '{{route('productView' , $variety->products->id)}}')
                                })
                                Sproducts{{$Sproducts}}.addEventListener('mousemove' , function (e){
                                    setTimeout(function (){
                                        Sproducts{{$Sproducts}}.removeAttribute('href')
                                    },500)
                                })
                            }else {
                                let Sproducts{{$Sproducts}} = document.querySelector('.Sproducts{{$Sproducts}}');
                                Sproducts{{$Sproducts}}.addEventListener('mousedown' , function (e){
                                    Sproducts{{$Sproducts}}.setAttribute('href' , '{{route('productView' , $variety->products->id)}}')
                                })
                                Sproducts{{$Sproducts}}.addEventListener('mousemove' , function (e){
                                    Sproducts{{$Sproducts}}.removeAttribute('href')
                                })
                            }
                        </script>
                    @endforeach
                </div>
                <i class="kala-Similar-btnRight bi-chevron-right position-absolute bg-light shadow-sm  align-items-center justify-content-center border"></i>
            </div>
        </div>
    </div>
@endsection
@vite(['resources/js/user_favorite.js'])
