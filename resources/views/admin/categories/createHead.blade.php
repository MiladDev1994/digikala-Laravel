@extends('admin.admin_app')


@section('admin')



    <form method="post" action="{{route('categories.storeHead')}}" class="w-100  d-flex align-items-center justify-content-center py-5 flex-column px-4" enctype="multipart/form-data">
        @csrf
        <div class="row w-100 d-flex align-items-center justify-content-center">

            <div class="col-12 col-md-6 position-relative">
                <input name="name" type="text" class="input-group-text bg-dark text-light text-start w-100" placeholder="نام دسته " style="border: none ; outline: none">
                @error('name')
                <div class="bg-danger position-absolute rounded-circle" style="width: 5px ; height: 5px ; top: 15% ; right: 15px"></div>
                @enderror
            </div>

            <div class="col-6 col-md-3 py-3">
                <div class="position-relative text-dark h5  m-auto border border-dark rounded-3 d-flex position-relative align-items-center justify-content-center" style="width: 120px ; height: 120px">
                    <input name="image" type="file" class="w-100 position-absolute h-100 opacity-0">
                    <i class="bi-plus h1 text-dark me-1 mt-2"></i>
                    عکس
                    @error('image')
                    <div class="text-danger position-absolute rounded-circle text-center" style=" white-space: nowrap; top: 110% ; right: -25px ; font-size: 13px">
                        نسبت 1 به 1 و فرمت png باشد
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-6 col-md-3 py-3">
                <div class="position-relative text-dark h5  m-auto border border-dark rounded-3 d-flex align-items-center position-relative justify-content-center" style="width: 120px ; height: 120px">
                    <input name="logo" type="file" class="w-100 position-absolute h-100 opacity-0">
                    <i class="bi-plus h1 text-dark me-1 mt-2"></i>
                    لوگو
                    @error('logo')
                    <div class="text-danger position-absolute rounded-circle text-center" style=" white-space: nowrap; top: 110% ; right: 0px ; font-size: 13px">
                         فرمت لوگو svj باشد
                    </div>
                    @enderror
                </div>
            </div>

        </div>


        <button class="btn btn-success mt-5">ایجاد </button>
    </form>


@endsection
@vite(['resources/js/admin/products/create.js'])
