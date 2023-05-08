@extends('seller.seller_app')
@section('seller')

    @php
        $varType = '';
    @endphp

    @if($product->variety_type == 'color') @php $varType = 'رنگ'; @endphp
    @elseif($product->variety_type == 'size') @php $varType = 'سایز'; @endphp
    @elseif($product->variety_type == 'Weight') @php $varType = 'وزن'; @endphp
    @elseif($product->variety_type == 'volume') @php $varType = 'حجم'; @endphp
    @elseif($product->variety_type == 'number') @php $varType = 'تعداد'; @endphp
    @endif
    <h4 class="text-center opacity-50 py-2">درخواست افزودن {{$varType}}</h4>

{{--    {{dd($product->variety_type)}}--}}

    <form method="post" action="{{route('seller.request.variety.store')}}" class="w-100 p-4 d-flex align-items-center justify-content-center flex-column">
        @csrf
        <input name="var" type="text" class="input-group-text bg-dark text-light text-center shadow m-3" placeholder="عنوان {{$varType}} ??" style="border: none ; outline: none">
        <input name="type" type="hidden" value="افزودن {{$varType}}">

        @error('var')<p class="text-danger" style="font-size: 12px"> لطفا فیلد را پرکنید </p>@enderror

        <button class="btn btn-success m-4"> ایجاد </button>
    </form>

{{--    {{dd(session('addVar'))}}--}}
@endsection
