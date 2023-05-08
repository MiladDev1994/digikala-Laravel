@extends('seller.seller_app')

@section('seller')

    <h4 class="text-center opacity-50 py-3">درخواست افزودن عکس</h4>

<div class="w-100 d-flex align-items-center justify-content-center flex-column" style="height: 620px">
    <p style="font-size: 12px" class="opacity-50">نسبت عکس باید 1 به 1 و فرمت آن jpg باشد</p>
    <form method="post" action="{{route('seller.request.image.store' , $product->id)}}" enctype="multipart/form-data" class="w-50 d-flex align-items-center justify-content-center flex-column">
        @csrf
        @method('post')
        <div class=" border border-dark rounded-3 position-relative d-flex align-items-center justify-content-center position-relative" style="width: 100px ; height: 100px ">
            <i class="bi-plus-square-dotted  text-dark " style="font-size: 50px"> </i>
            <input type="file" name="addPic"  class="w-100 h-100 position-absolute opacity-0" style="cursor: pointer">
            @error('addPic')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 10px ; right: 10px"></div>@enderror
        </div>


        <button class="btn btn-success mt-5">ارسال </button>
    </form>
</div>

{{--{{dd($product)}}--}}


@endsection

@vite(['resources/js/admin/products/create.js'])
