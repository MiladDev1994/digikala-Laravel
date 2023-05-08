@extends('admin.admin_app')
@section('admin')


    <h4 class="text-center opacity-50 p-2"> گارانتی ها </h4>

    <div class="opacity-50 p-4 text-warning" style="font-size: 13px">* پرکردن تمام فیلدها اجباریست </div>


    <form method="post" action="{{route('admin.warranties.store')}}" enctype="multipart/form-data" class="p-4 border-bottom border-dark border-2">
        @csrf
        @method('post')
        <div class="row">

            <div class="col-12 col-md-4 py-2 d-flex align-items-center justify-content-center position-relative">
                <input type="text" name="name" class="input-group-text bg-dark text-light w-75 m-auto shadow" placeholder="نام گارانتی ...." style="border: none ; outline: none">
                @error('name')<div class="bg-danger position-absolute rounded-circle" style="width: 7px ; height: 7px ; right: 70px"></div>@enderror

            </div>

            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center position-relative">
                <select name="period" class="form-select bg-dark text-light text-center w-75 shadow" style="border: none ; outline: none">
                    <option value="" class="text-secondary"> مدت زمان .... </option>
                    <option value="6 ماهه"> 6 ماهه </option>
                    <option value="12 ماهه"> 12 ماهه </option>
                    <option value="18 ماهه"> 18 ماهه </option>
                    <option value="24 ماهه"> 24 ماهه </option>
                    <option value="36 ماهه"> 36 ماهه </option>
                    <option value="48 ماهه"> 48 ماهه </option>
                </select>
                @error('period')<div class="bg-danger position-absolute rounded-circle" style="width: 7px ; height: 7px ; right: 70px"></div>@enderror
            </div>

            <div class="col-12 col-md-4 py-2">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <div class="border border-dark m-auto position-relative d-flex align-items-center justify-content-center text-dark  rounded-3 shadow" style="width: 100px ; height: 100px ; white-space: nowrap">
                        <input type="file" name="document" class="position-absolute w-100 h-100 opacity-0">
                        تصویر گارانتی
                    </div>
                    @error('document')<div class="text-danger rounded-circle" style="font-size: 12px">  فرمت باید jpg باید </div>@enderror
                </div>


            </div>

        </div>


        <button class="btn btn-success d-block m-auto mt-4 shadow"> ایجاد </button>
    </form>


<div class="p-4">
    <div class="row p-2 border border-dark shadow" style="border-radius: 10px">
        @foreach($guarantees as $guarantee)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-1 " >
                <div class="w-100 text-center btn btn-dark opacity-75" style="font-size: 11px ; white-space: nowrap">{{$guarantee->name}} {{$guarantee->period}} </div>
            </div>
        @endforeach
    </div>
</div>




@endsection
@vite(['resources/js/admin/products/create.js'])
