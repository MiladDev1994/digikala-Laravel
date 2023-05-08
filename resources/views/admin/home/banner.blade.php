@extends('admin.admin_app')
@vite(['resources/js/admin/products/create.js'])

@section('admin')


    @php
        $image_head = explode(',' , $homeview[8]->image)
    @endphp

{{--    header--}}
    <form class="border-bottom border-dark" method="post" action="{{route('admin.home.banner.headUpdate')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-100 bg-warning m-auto px-4 position-relative shadow" style="height: 50px ; background-image: url('{{url('images/' . $image_head[0])}}') ; background-size: cover ; background-position: center">
            <input class="w-100 h-100 position-absolute opacity-0" type="file" name="baner">
        </div>
        <div class="text-danger text-center py-1" style="font-size: 13px">@error('baner'){{'سایز عکس باید 28 به 1 باشد و فرمت عکس باید jpg , jpeg و یا gif باشد'}}@enderror</div>
        <div class="d-flex align-items-center justify-content-center py-3 ">

            <div class="me-5 mt-2" style="width: 200px">
                <select name="brand" class="form-select bg-dark  text-light text-center shadow" style="outline: none ; border: none">
                    <option  value="">انتخاب برند ....</option>
                    @foreach($brands as $brand)
                        {{$brand->id}}
                        <option {{$brand->id == $homeview[8]->brand_id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
                <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                    @error('brand'){{'فیلد برند نباید خالی باشد'}}@enderror
                </div>
            </div>
            <button class="btn-sm btn-success shadow"> ذخیره </button>
        </div>
    </form>



{{--    categoryNarrow--}}
    <p class="mt-2 px-2 opacity-50 text-center" style="font-size: 17px ; font-weight: 600">شگفت متصل به گروه</p>
    <div class="border-bottom border-dark pb-4">

        <form method="post" action="{{route('admin.home.banner.specialCategoryUpdate')}}" class="d-flex align-items-center justify-content-center px-2">
            @csrf
            @method('post')
            <div class=" overflow-hidden d-flex  align-items-center justify-content-center position-relative text-dark me-3 shadow" style="width: 80px ; height: 80px ; border-radius: 50% ; background-color: {{$homeview[0]->image}}">
                <input value="{{$homeview[0]->image}}" type="color" name="color" class="w-100 h-100 position-absolute opacity-0" style="z-index: 99 ; cursor: pointer">
                <div class="opacity-75" style="font-weight: 700 ; text-shadow:white">رنگ زمینه</div>
            </div>
            <div class="me-3 mt-2" style="width: 250px">
                <select name="categories" class="form-select bg-dark text-light text-center shadow w-100" style="outline: none ; border: none" >
                    <option  value="">انتخاب گروه ....</option>
                    @foreach($categories as $category)
                        <option {{$category->id == $homeview[0]->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                    @error('categories'){{'فیلد گروه نباید خالی باشد'}}@enderror
                </div>
            </div>
            <button class="btn-sm btn-success shadow"> ذخیره </button>
        </form>
    </div>







{{--    category4Pic--}}
    <form method="post" action="{{route('admin.home.banner.Category4PicUpdate')}}" enctype="multipart/form-data" class="pb-4 border-bottom border-dark">
        @csrf
        @method('post')
        <div class="row py-2 px-4">
            @for($v = 1; $v < 5; $v++)
                <div class="col-12 col-sm-6 col-lg-3 p-3">
                    <div class="w-100 shadow imageBox{{$v}}" style="background-image: url('{{url('images/'.$homeview[$v]->image)}}');border-radius: 10px ; background-size: cover">
                        <input class="w-100 h-100 opacity-0" type="file" name="image{{$v}}" style="cursor: pointer">
                    </div>
                    <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                        @error('image'.$v){{'نسبت عکس باید 5 به 2 بوده و فرمت  jpg و یا gif باشد'}}@enderror
                    </div>
                    <div class="me-3 mt-2 w-100" >
                        <select name="category{{$v}}" class="form-select text-light text-center bg-dark" style="outline: none ; border: none">
                            <option  value="">انتخاب گروه ....</option>
                            @foreach($categories as $category)
                                <option {{$homeview[$v]->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                            @error('category'.$v){{'فیلد گروه نباید خالی باشد'}}@enderror
                        </div>
                    </div>
                </div>
                <script>
                    setInterval(function (){
                        let imageBox{{$v}} = document.querySelector('.imageBox{{$v}}');
                        imageBox{{$v}}.style.height = imageBox{{$v}}.scrollWidth*0.7 + 'px';
                    } , 10 )
                </script>
            @endfor
        </div>
        <button class="btn btn-success d-block m-auto"> ذخیره </button>
    </form>





    {{--    category2Pic--}}
    <form method="post" action="{{route('admin.home.banner.Category2PicUpdate')}}" enctype="multipart/form-data" class="pb-4 border-bottom border-dark">
        @csrf
        @method('post')
        <div class="row py-2 px-4">
            @for($v = 5 ; $v < 7 ; $v++)
                <div class="col-12 col-md-6 p-3">
                    <div class="w-100 shadow imageBox{{$v}}" style="background-image: url('{{url('images/'.$homeview[$v]->image)}}');border-radius: 10px ; background-size: cover">
                        <input class="w-100 h-100 opacity-0" type="file" name="image{{$v}}" style="cursor: pointer">
                    </div>
                    <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                        @error('image'.$v){{'نسبت عکس باید 5 به 2 بوده و فرمت  jpg , jpeg و یا gif باشد'}}@enderror
                    </div>
                    <div class="me-3 mt-2 w-100" >
                        <select name="category{{$v}}" class="form-select text-light text-center bg-dark" style="outline: none ; border: none">
                            <option  value="">انتخاب گروه ....</option>
                            @foreach($categories as $category)
                                <option {{$homeview[$v]->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                            @error('category'.$v){{'فیلد گروه نباید خالی باشد'}}@enderror
                        </div>
                    </div>
                </div>
                <script>
                    setInterval(function (){
                        let imageBox{{$v}} = document.querySelector('.imageBox{{$v}}');
                        imageBox{{$v}}.style.height = imageBox{{$v}}.scrollWidth*0.4 + 'px';
                    } , 10 )
                </script>
            @endfor
        </div>
        <button class="btn btn-success d-block m-auto"> ذخیره </button>
    </form>






    {{--    category1Pic--}}
    <form method="post" action="{{route('admin.home.banner.Category1PicUpdate')}}" enctype="multipart/form-data" class="w-100 p-4 border-dark border-bottom">
        @csrf
        @method('post')
        <div class="w-100 shadow imageBox7" style="background-image: url('{{url('images/'.$homeview[7]->image)}}');border-radius: 10px ; background-size: cover">
            <input class="w-100 h-100 opacity-0" type="file" name="image7" style="cursor: pointer">
        </div>
        <div class=" text-warning py-1 text-center"  style="font-size: 13px">
            @error('image7'){{'نسبت عکس باید 8 به 1 بوده و فرمت  jpg , jpeg و یا gif باشد'}}@enderror
        </div>


        <div class="d-flex align-items-center justify-content-center mt-3">
            <select name="brand7" class="form-select bg-dark text-center text-light me-3" style="float: right ; border: none ; outline: none ; width: 200px">
                <option  value="">انتخاب برند ....</option>
                @foreach($brands as $brand)
                    <option {{$homeview[7]->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            <button class="btn-sm btn-success"> ذخیره </button>
        </div>
        <div class=" text-warning py-1 text-center"  style="font-size: 13px">
            @error('brand7'){{'فیلد برند نباید خالی باشد'}}@enderror
        </div>
        <script>
            setInterval(function (){
                let imageBox7 = document.querySelector('.imageBox7');
                imageBox7.style.height = imageBox7.scrollWidth*0.125 + 'px';
            } , 10 )
        </script>
    </form>






{{--Articla--}}
    <h4 class="text-center opacity-50 mt-2">مقالات</h4>
    <form class="pb-5 px-4 w-100 bg" style="width: 97%" method="post" action="{{route('admin.home.banner.articleUpdate')}}">
        @csrf
        @method('post')
        <div class="row px-2 py-2 d-flex align-items-center justify-content-center">
            @foreach($articles as $article)
                <div title="{{$article->subject}}" class=" me-3 mt-3 shadow p-0" style="background-image: url('{{url('images/'.$article->logo)}}') ; width: 150px ; height: 150px ; float: right ; background-size: cover ; background-position: center;transition: 0.3s ; border-radius: 10px">
                    <input {{$article->special == 1 ? 'checked' : ''}}  type="checkbox" name="article{{$article->id}}" class="w-100 h-100 opacity-25" style="accent-color:#000000 ; cursor: pointer">
                </div>
            @endforeach
        </div>

        <button class="btn btn-success m-auto d-block mt-4">انتخاب </button>


    </form>

@endsection



