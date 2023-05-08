@extends('admin.admin_app')
@section('admin')

    <h4 class="text-center py-2 opacity-50">رنگ‌ها</h4>


    <form method="post" action="{{route('admin.variations.color.store')}}">
        @csrf
        <div class="d-flex align-items-center justify-content-center py-2">
            <input name="name" type="text" class="input-group-text bg-dark text-light me-3 shadow" placeholder="نام رنگ...." style="width: 300px ; border: none ; outline: none">
            <input name="color" type="color" class="p-0 shadow" style="width: 50px ; border: none ; outline: none ; border-radius: 50%">
        </div>
        @error('name') <div class="text-danger text-center" style="font-size: 13px">نام رنگ نباید تکراری باشد</div> @enderror
        <button class="btn btn-success m-auto d-block mt-4 shadow">ایجاد</button>
    </form>


    <div class="d-flex align-items-center justify-content-center p-4">
        <div class="border border-dark p-4 w-100 shadow" style="border-radius: 10px">
            @foreach($colors as $color)
                <div class="border border-dark rounded-3 shadow-sm float-start m-2 d-flex align-items-center justify-content-between p-2" style="width: 170px ">
                    <div class="rounded-3 shadow" style="width: 35px ; height: 35px ; background-color: {{$color->color}}"></div>
                    <div class="rounded-3 opacity-75" style="">{{$color->name}}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
@vite(['resources/js/admin/products/create.js'])

