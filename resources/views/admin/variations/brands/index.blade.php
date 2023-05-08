@extends('admin.admin_app')
@section('admin')


    <h4 class="text-center opacity-50 p-2"> برند ها </h4>

    <div class="opacity-50 p-4 text-warning" style="font-size: 13px">* پرکردن تمام فیلدها اجباریست </div>


    <form method="post" action="{{route('admin.brands.store')}}" enctype="multipart/form-data" class="p-4 border-bottom border-dark border-2">
        @csrf
        @method('post')
        <div class="row">

            <div class="col-12 col-md-4 py-2 d-flex align-items-center justify-content-center position-relative">
                <input type="text" name="name" class="input-group-text bg-dark text-light w-75 m-auto shadow" placeholder="نام برند ...." style="border: none ; outline: none">
                @error('name')<div class="bg-danger position-absolute rounded-circle" style="width: 7px ; height: 7px ; right: 50px"></div>@enderror

            </div>

            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center position-relative">
                <select name="national" class="form-select bg-dark text-light text-center w-75 shadow" style="border: none ; outline: none">
                    <option value="" class="text-secondary"> ملیت .... </option>
                    <option value="ایران"> ایران </option>
                    <option value="امریکا"> امریکا </option>
                    <option value="فرانسه"> فرانسه </option>
                    <option value="آلمان"> آلمان </option>
                    <option value="انگلیس"> انگلیس </option>
                    <option value="ترکیه"> ترکیه </option>
                    <option value="چین"> چین </option>
                    <option value="کانادا"> کانادا </option>
                </select>
                @error('national')<div class="bg-danger position-absolute rounded-circle" style="width: 7px ; height: 7px ; right: 50px"></div>@enderror
            </div>

            <div class="col-12 col-md-4 py-2">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <div class="border border-dark m-auto position-relative d-flex align-items-center justify-content-center text-dark h4 rounded-3 shadow" style="width: 100px ; height: 100px">
                        <input type="file" name="logo" class="position-absolute w-100 h-100 opacity-0">
                        لوگو
                    </div>
                    @error('logo')<div class="text-danger rounded-circle" style="font-size: 12px"> نسبت عکس 1 به 1 و فرمت png </div>@enderror
                </div>


            </div>

            <div class="col-12 col-md-12 py-2 position-relative">
                <textarea placeholder="درباره ...." name="about" class="w-100 input-group p-2 bg-dark text-light rounded-3 shadow" style="border: none ; outline: none"></textarea>
                @error('about')<div class="bg-danger position-absolute rounded-circle" style="width: 7px ; height: 7px ; right: 20px ; top: 50%"></div>@enderror
            </div>
        </div>







        <button class="btn btn-success d-block m-auto mt-4 shadow"> ایجاد </button>
    </form>




    <form class="p-4" method="post" action="{{route('admin.brands.update')}}">
        @csrf
        <div class="row d-flex align-items-center justify-content-center">
            @foreach($brands as $brand)
                @if($brand->name != 'متفرقه')
                    <div class="d-inline-block m-2 rounded-3 shadow p-0 overflow-hidden" style="width: 150px ; height: 150px ; background-image: url('{{url('images/'.$brand->logo)}}') ; background-size: cover ; background-position: center">
                        <input type="checkbox" {{$brand->special == 1 ? 'checked' : ''}}  name="act{{$brand->id}}" class="w-100 h-100 opacity-50" style="cursor: pointer ; accent-color: black">
                    </div>
                @endif
            @endforeach
        </div>


        <button class="btn btn-success mt-5 d-block m-auto shadow">ذخیره</button>
    </form>


@endsection
@vite(['resources/js/admin/products/create.js'])
