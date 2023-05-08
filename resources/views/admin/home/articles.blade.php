@extends('admin.admin_app')

@section('admin')

    <h4 class="p-2 opacity-50">ایجاد مقاله</h4>
    <form method="post" action="{{route('admin.home.articles.create')}}" enctype="multipart/form-data" class="border-bottom border-dark">
        @csrf
        @method('post')
        <div class="row px-4 mt-3">
            <div class="col-12 col-md-4 bg-warning-4 d-flex align-items-center justify-content-center px-3 flex-column">
                <input type="text" name="subject" placeholder="موضوع" class="bg-dark text-light rounded-3 w-100 px-3" style="border: none ; outline: none ; height: 40px">
                <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                    @error('subject'){{'فیلد موضوع نباید خالی باشد'}}@enderror
                </div>
            </div>


            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center flex-column mt-2">
                <div class="h5 opacity-50 ">کاور</div>
                <div class="border border-danger mt-2 d-flex align-items-center justify-content-center logoBox position-relative overflow-hidden" style="width: 80% ; height: 300px ; border-radius: 10px">
                    <i class="bi-plus-square-dotted position-absolute text-secondary" style="font-size: 50px"></i>
                    <img id="logo" width="100%">
                    <input type="file" name="logo" class="w-100 h-100 opacity-0 logoInput position-absolute" style="cursor: pointer">
                </div>
                <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                    @error('logo'){{'ابعاد عکس باید 610 در 380 بوده و فرمت jpg باشد'}}@enderror
                </div>
                <div class="progress mt-3 w-50 m-auto bg-dark opacity-50" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar1 progress-bar-striped progress-bar-animated bg-danger" style="width: 0"></div>
                </div>
            </div>

            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center flex-column mt-2">
                <div class="h5 opacity-50 ">فایل</div>
                <div class="border border-danger mt-2 d-flex align-items-center justify-content-center fileBox position-relative overflow-hidden" style="width: 80% ; height: 300px ; border-radius: 10px">
                    <i class="bi-plus-square-dotted position-absolute text-secondary" style="font-size: 50px"></i>
                    <img id="file" width="100%">
                    <input type="file" name="file" class="w-100 h-100 opacity-0 fileInput position-absolute" style="cursor: pointer">
                </div>
                <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                    @error('file'){{'ابعاد عکس باید 822 به 522 بوده و فرمت jpg باشد'}}@enderror
                </div>
                <div class="progress mt-3 w-50 m-auto bg-dark opacity-50" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar2 progress-bar-striped progress-bar-animated bg-danger" style="width: 0"></div>
                </div>
            </div>

        </div>
        <div class="px-4 py-3 mt-2">
            <textarea type="text" name="Introduction" placeholder="مقدمه" class="w-100 bg-dark text-light rounded-3 p-2" style="border: none ; outline: none"></textarea>
            <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                @error('Introduction'){{'فیلد مقدمه نباید خالی باشد'}}@enderror
            </div>
        </div>
        <div class="px-4 py-3">
            <textarea type="text" name="about1" placeholder="توصیحات 1" class="w-100 bg-dark text-light rounded-3 p-2" style="border: none ; outline: none"></textarea>
            <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                @error('about1'){{'فیلد توضیحات 1 نباید خالی باشد'}}@enderror
            </div>
        </div>
        <div class="px-4 py-3">
            <textarea type="text" name="about2" placeholder="توصیحات 2" class="w-100 bg-dark text-light rounded-3 p-2" style="border: none ; outline: none"></textarea>
        </div>
        <div class="px-4 py-3">
            <textarea type="text" name="about3" placeholder="توصیحات 3" class="w-100 bg-dark text-light rounded-3 p-2" style="border: none ; outline: none"></textarea>
        </div>
        <div class="px-4 py-3">
            <textarea type="text" name="about4" placeholder="توصیحات 4" class="w-100 bg-dark text-light rounded-3 p-2" style="border: none ; outline: none"></textarea>
        </div>

        <div class="p-4 d-flex">
            <div class="">
                <select class="bg-dark form-select  text-light" dir="rtl" name="product" style="border: none ; outline: none">
                    <option value=""> انتخاب محصول ....</option>
                    @foreach($products as $product)
                        <option aria-invalid="{{$product->id}}" class="d-flex align-items-center justify-content-around text-end" dir="rtl" value="{{$product->id}}">
                            {{$product->id}} --- {{$product->name}}
                        </option>
                    @endforeach
                </select>
                <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                    @error('product'){{'فیلد محصول نباید خالی باشد'}}@enderror
                </div>
            </div>
            <button class="btn btn-success ms-3"> ایجاد </button>
        </div>
    </form>




    <h4 class="p-4 text-center opacity-50"> مقالات </h4>
    <div class="row px-4 pb-4 d-flex align-items-center justify-content-center">
        @foreach($articles as $article)
            <div title="{{$article->subject}}" class=" me-3 mt-3 shadow p-0 position-relative"
                 style="background-image: url('{{url('images/'.$article->logo)}}') ; width: 150px ; height: 150px ; float: right ; background-size: cover ;
                     background-position: center;transition: 0.3s ; border-radius: 10px">
                <a href="{{route('admin.home.articles.destroy' , $article->id)}}" class="position-absolute bg-danger rounded-circle p-1 opacity-50 text-light" style="left: 10px ; top: 5px ; cursor: pointer">
                    <i class="bi-x-lg  "></i>
                </a>

            </div>
        @endforeach
    </div>

@endsection
@vite(['resources/js/admin/admin_home_article.js'])



