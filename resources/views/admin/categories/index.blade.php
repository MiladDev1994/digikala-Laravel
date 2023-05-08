@extends('admin.admin_app')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('admin')


    <style>
        /*a{*/
        /*    transition: 0.3s;*/
        /*}*/
        /*a:hover{*/
        /*    color: #000000 !important;*/
        /*}*/
        .addTopCat:hover{
            color: #009784 !important;
            transition: 0.3s;
        }
        .addCat:hover{
            color: #a5a5a5 !important;
            transition: 0.3s;
        }
    </style>





    <h4 class="text-center py-2 opacity-50">دسته بندی‌ها</h4>








    <a href="{{route('categories.createHead')}}" class="d-flex px-4 addCat" style="text-decoration: none ; color: #008275 ; width: 250px">
        <i class="bi-plus" style="font-size: 35px"></i>
        <div class="h5 mt-1">افزودن سردسته</div>

    </a>

    <div class="w-100 p-4">
        @foreach($categories as $category)
            @if($category->level == 1)
                <div class="border border-dark shadow border-2 p-4 mt-4" style="border-radius: 15px">

                    <div class="d-flex align-items-center justify-content-center w-100">
                        <div class=" h4">{{$category->name}}</div>
                        <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3 addTopCat" style="text-decoration: none ; font-size: 40px">
                            <i class="bi-plus"></i>
                        </a>
                    </div>

                    {{--    <img width="100px" src="{{url('images/'.$category->image)}}">--}}
                    @if($category->child)
                        @foreach($category->child as $category)
                            <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 100% ; cursor: default">
                                <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                    <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                        <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                        <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                        <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="me-4">{{$category->name}}</div>
                                    <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                </div>
                                <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                    <i  class="bi-plus"></i>
                                </a>
                            </div>
                            @if($category->child)
                                @foreach($category->child as $category)
                                    <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 90% ; cursor: default">
                                        <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                            <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                                <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="me-4">{{$category->name}}</div>
                                            <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                        </div>
                                        <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                            <i  class="bi-plus"></i>
                                        </a>
                                    </div>
                                    @if($category->child)
                                        @foreach($category->child as $category)
                                            <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 80% ; cursor: default">
                                                <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                                    <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                                        <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                                        <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                                        <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="me-4">{{$category->name}}</div>
                                                    <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                                </div>
                                                <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                                    <i  class="bi-plus"></i>
                                                </a>
                                            </div>
                                            @if($category->child)
                                                @foreach($category->child as $category)
                                                    <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 70% ; cursor: default">
                                                        <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                                            <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                                                <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                                                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                                                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <div class="me-4">{{$category->name}}</div>
                                                            <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                                        </div>
                                                        <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                                            <i  class="bi-plus"></i>
                                                        </a>
                                                    </div>
                                                    @if($category->child)
                                                        @foreach($category->child as $category)
                                                            <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 60% ; cursor: default">
                                                                <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                                                    <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                                                        <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                                                        <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                                                        <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <div class="me-4">{{$category->name}}</div>
                                                                    <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                                                </div>
                                                                <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                                                    <i  class="bi-plus"></i>
                                                                </a>
                                                            </div>
                                                            @if($category->child)
                                                                @foreach($category->child as $category)
                                                                    <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 50% ; cursor: default">
                                                                        <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                                                            <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                                                                <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                                                                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                                                                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            <div class="me-4">{{$category->name}}</div>
                                                                            <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                                                        </div>
                                                                        <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                                                            <i  class="bi-plus"></i>
                                                                        </a>
                                                                    </div>
                                                                    @if($category->child)
                                                                        @foreach($category->child as $category)
                                                                            <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 40% ; cursor: default">
                                                                                <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                                                                    <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                                                                        <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                                                                        <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                                                                        <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center justify-content-center">
                                                                                    <div class="me-4">{{$category->name}}</div>
                                                                                    <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                                                                </div>
                                                                                <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                                                                    <i  class="bi-plus"></i>
                                                                                </a>
                                                                            </div>
                                                                            @if($category->child)
                                                                                @foreach($category->child as $category)
                                                                                    <div href="" class="btn btn-dark m-auto d-block mt-3 d-flex align-items-center justify-content-between " style="width: 30% ; cursor: default">
                                                                                        <div class="category{{$category->id}}" style="right: 10px; font-size: 25px">
                                                                                            <div class="position-relative togleDeActive shadow" style="width: 40px ; height: 25px ; background-color: {{$category->special == 1 ? '#01c394' : '#fb5b5b'}} ; border-radius: 15px ; cursor: pointer ; box-shadow: 0 0 4px rgba(0, 0, 0, 0.62) inset; ">
                                                                                                <div class="position-absolute  bg-dark" style="left: {{$category->special == 1 ? '3px' : '18px'}} ; height: 19px ; width: 19px ; top: 3px ; border-radius: 15px ; transition: 0.2s"></div>
                                                                                                <div class="w-100 h-100 bg-warning position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '1' : '2'}}"></div>
                                                                                                <div class="w-100 h-100 bg-primary position-absolute opacity-0" style="z-index: {{$category->special == 1 ? '2' : '1'}}"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                                            <div class="me-4">{{$category->name}}</div>
                                                                                            <div class=""><img width="40px" src="{{url('images/'.$category->image)}}"></div>
                                                                                        </div>
                                                                                        <a href="{{route('categories.create' , $category->id)}}" class="text-light rounded-3" style="text-decoration: none ; font-size: 40px ; background-color: #00564d">
                                                                                            <i  class="bi-plus"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </div>

            @endif
        @endforeach
    </div>


    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        let catID = @php echo $catId ; @endphp;

        catID.forEach(function (e){

            let togleBoxMain = document.querySelector('.category' + e);

            let togleBox = togleBoxMain.childNodes[1];
            let togleBoxView = togleBoxMain.childNodes[1].childNodes[1];
            let togleBoxAct = togleBoxMain.childNodes[1].childNodes[5];
            let togleBoxdeAct = togleBoxMain.childNodes[1].childNodes[3];

            // console.log(togleBoxdeAct)

            togleBoxAct.addEventListener('click' , function (e){
                this.style.zIndex = 1;
                togleBoxdeAct.style.zIndex = 2;
                togleBoxView.style.left = '18px';
                togleBox.style.backgroundColor = '#fb5b5b';

                let $parent = Number(togleBox.parentNode.className.split('').splice(8).toString().replace(',' , ''));
                // console.log($parent)

                $.ajax({
                    url:'{{route('categories.special')}}',
                    method:'POST',
                    data:{
                        category : $parent,
                        active : 0,
                    },
                    success:function(data){
                    },
                });
            })


            togleBoxdeAct.addEventListener('click' , function (e){
                this.style.zIndex = 1;
                togleBoxAct.style.zIndex = 2;
                togleBoxView.style.left = '3px';
                togleBox.style.backgroundColor = '#01c394';

                let $parent = Number(togleBox.parentNode.className.split('').splice(8).toString().replace(',' , ''));
                $.ajax({
                    url:'{{route('categories.special')}}',
                    method:'POST',
                    data:{
                        category : $parent,
                        active : 1,
                    },
                    success:function(data){
                    },
                });
            })

        })

    </script>



@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
{{--@vite(['resources/js/admin/products/create.js'])--}}
