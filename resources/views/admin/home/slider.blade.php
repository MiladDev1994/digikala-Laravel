@extends('admin.admin_app')

@section('admin')

    <h4 class="p-2 opacity-50">اسلایدر</h4>

    <form action="{{route('admin.home.slider.create')}}" class=" w-100 px-4 border-bottom border-dark py-3" enctype="multipart/form-data"
          method="post">
        @csrf
        @method('post')
        <div class="row">

            <div class="co-12 col-md-6  align-items-center justify-content-center py-2">
                <div class="overflow-hidden opacity-100 position-relative border border-danger d-flex align-items-center justify-content-center picBox m-auto" style="width: 90%; height: 150px ; border-radius: 10px">
                    <i class="bi-plus-square-dotted position-absolute text-secondary" style="font-size: 50px"></i>
                    <img  id="ax" width="100%" class="position-absolute">
                    <input type="file" name="pictureSlider" class=" w-100 h-100 opacity-0 inputFile" id="file" style="cursor: pointer">
                </div>
                <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                    @error('pictureSlider'){{'ابعاد عکس باید 2880 در 600 بوده و فرمت jpeg و یا jpg باشد'}}@enderror
                </div>
                <div class="progress mt-3 w-50 m-auto bg-dark opacity-50" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: 0"></div>
                </div>
            </div>


            <div class="co-12 col-md-6 py-2 d-flex align-items-center justify-content-center">
                <div class="">
                    <select name="groupSlider" class="form-select bg-dark text-light text-center me-3" style="border: none ; outline: none ; width: 300px">
                        <option value="">انتخاب گروه ....</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class=" text-warning py-1 text-center"  style="font-size: 13px">
                        @error('groupSlider'){{'فیلد برند نباید خالی باشد'}}@enderror
                    </div>
                </div>

                <button class="btn-sm btn-success">افزودن</button>
            </div>

        </div>

    </form>



    <div class="w-100 px-4 mb-5">

        @foreach($sliders as $slider)
            <div class=" position-relative mt-4 picBoxBottom{{$slider->id}}" style="border-radius: 10px ; background-image: url('{{url('images/'.$slider->image)}}') ; background-size: cover ; background-position: center">
                <div class="p-2 text-dark h4">{{$slider->category->name}}</div>
                <a href="{{route('admin.home.slider.destroy'  , $slider->id)}}" class="position-absolute text-dark" style="left: 10px ; top: 5px ; text-decoration: none">
                    <i class="bi-x-lg h4"></i>
                </a>
            </div>


            <script>
                setInterval(function (){
                    let picBoxBottom{{$slider->id}} = document.querySelector('.picBoxBottom{{$slider->id}}');
                    picBoxBottom{{$slider->id}}.style.height = picBoxBottom{{$slider->id}}.scrollWidth*0.2084 + 'px';
                } , 10)

            </script>

        @endforeach
    </div>


















@endsection
@vite(['resources/js/admin/admin_home_slider.js'])



