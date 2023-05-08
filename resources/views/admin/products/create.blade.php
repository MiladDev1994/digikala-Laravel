@extends('admin.admin_app')

@section('admin')


    <style>
        a:hover{
            color: white!important;
            transition: 0.3s;
        }
    </style>
<div class="w-100">
    <h4 class="text-center py-2 opacity-50">افزودن محصول</h4>


<form  class="d-flex align-items-center justify-content-around flex-column position-relative" method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')

    <div class="row w-100 d-flex border-bottom border-dark py-3">

        <div class="col-12 col-md-7 d-flex flex-column position-relative">
            @error('facke')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 55px ; right: 30px"></div>@enderror
            <p class="text-center opacity-50">انتخاب دسته</p>
            <select  name="group[]" style="border: none ; outline: none" class="sellect form-select bg-dark text-light text-center">
                <option value="" class="optionF text-secondary">گروه ....</option>
                {{--        <option> گروه کالایی ...</option>--}}
                @foreach($groups as $group)
                    @if($group->child !='[]')

                    @else
                        <option  {{$group->id == 1 ? 'selected' : ''}} value="{{$group->id}}" class=" text-light option{{$group->id}}">
                            {{$group->name}}{{$group->parent !='[]' ? '/' : ''}}
                            @if($group->parent)
                                @foreach($group->parent as $group)
                                    {{$group->name}}{{$group->parent !='[]' ? '/' : ''}}
                                    @if($group->parent)
                                        @foreach($group->parent as $group)
                                            {{$group->name}}{{$group->parent !='[]' ? '/' : ''}}
                                            @if($group->parent)
                                                @foreach($group->parent as $group)
                                                    {{$group->name}}{{$group->parent !='[]' ? '/' : ''}}
                                                    @if($group->parent)
                                                        @foreach($group->parent as $group)
                                                            {{$group->name}}{{$group->parent !='[]' ? '/' : ''}}
                                                            @if($group->parent)
                                                                @foreach($group->parent as $group)
                                                                    {{$group->name}}{{$group->parent !='[]' ? '/' : ''}}
                                                                    @if($group->parent)
                                                                        @foreach($group->parent as $group)
                                                                            {{$group->name}}{{$group->parent !='[]' ? '/' : ''}}
                                                                            @if($group->parent)
                                                                                @foreach($group->parent as $group)
                                                                                    {{$group->name}}
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
                        </option>
                    @endif
                @endforeach
            </select>
            <a href="{{route('admin.categories')}}" target="_blank" class="text-info py-1 opacity-50" style="text-decoration: none ; font-size: 12px"> ایجاد گروه </a>

        </div>

        <div class="col-12 col-md-3 d-flex flex-column position-relative">
            @error('brand')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 55px ; right: 30px"></div>@enderror
            <p class="text-center opacity-50">انتخاب برند</p>
            <select name="brand" style="border: none ; outline: none" class=" form-select bg-dark text-light text-center">
                <option value="" class="text-secondary">برند .... </option>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            <a href="{{route('admin.brands')}}" target="_blank" class="text-info py-1 opacity-50" style="text-decoration: none ; font-size: 12px"> ایجاد برند </a>
        </div>

        <div class="col-12 col-md-2 d-flex flex-column position-relative">
            @error('variety')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 55px ; right: 30px"></div>@enderror
            <p class="text-center opacity-50">تنوع پذیری</p>
            <select name="variety" style="border: none ; outline: none" class=" form-select bg-dark text-light text-center">
                <option value="" class="text-secondary">تنوع .... </option>
                <option value="color"> رنگ </option>
                <option value="size"> سایز </option>
                <option value="Weight"> وزن </option>
                <option value="volume"> ابعاد </option>
                <option value="number"> تعداد </option>
                <option value="null"> تک تنوع </option>
            </select>
        </div>

    </div>



    <div class="row py-3 w-100 d-flex align-items-center justify-content-around border-bottom border-dark">

        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center py-3 px-3">
            <div class="row d-flex align-items-center w-100">
                <div class="col-11 position-relative">
                    @error('name')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 15px ; right: 30px"></div>@enderror
                    <input type="text" name="name" placeholder="نام کالا" class="w-100 input-group-text bg-dark text-light text-start" style="border: none ; outline: none">
                </div>
                <div class="col-1 mt-0 position-relative">
                    <label class="m-auto text-center py-2  mt-0 position-absolute" style="font-size: 14px ; top: -30px">
                        فعال
                    </label>
                    <input type="checkbox" name="active" class="w-100 form-check-input h4 bg-primary text-light text-start " style="border: none ; outline: none ; width: 30px!important ; height: 30px!important">
                </div>
            </div>


        </div>

        <div class="col-12 col-md-6 d-flex align-items-center justify-content-around py-2">
            <div class="position-relative" style="width: 20% ">
                @error('depth')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 15px ; right: 10px"></div>@enderror
                <input type="text" name="depth" placeholder="طول (cm)" class=" input-group-text bg-dark text-light text-start" style="width: 100% ; border: none ; outline: none">
            </div>

            <div class="position-relative" style="width: 20% ">
                @error('width')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 15px ; right: 10px"></div>@enderror
                <input type="text" name="width" placeholder="عرض (cm) " class=" input-group-text bg-dark text-light text-start" style="width: 100% ;border: none ; outline: none">
            </div>

            <div class="position-relative" style="width: 20% ">
                @error('height')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 15px ; right: 10px"></div>@enderror
                <input type="text" name="height" placeholder="ارتفاع (cm) " class=" input-group-text bg-dark text-light text-start" style="width: 100% ;border: none ; outline: none">
            </div>

            <div class="position-relative" style="width: 20% ">
                @error('Weight')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 15px ; right: 10px"></div>@enderror
                <input type="text" name="Weight" placeholder="وزن (g) " class=" input-group-text bg-dark text-light text-start" style="width: 100% ;border: none ; outline: none">
            </div>


        </div>

    </div>


        <select multiple name="facke[]" class="adddd position-absolute opacity-0" style="opacity: 1 ; left: 0 ; top: -50px">
        <option selected value="1"></option>
    </select>


    <div class="w-100 p-4 border-bottom border-dark position-relative">
        @error('Weight')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 50px ; right: 45px"></div>@enderror
        <textarea name="about" class="input-group-text bg-dark w-100 px-3  text-light text-start" placeholder="درباره محصول" style="border: none ; outline: none"></textarea>
    </div>









    <div class="w-100 d-flex align-items-center justify-content-center flex-column">
        <div class="w-100 d-flex align-items-center justify-content-center py-3 opacity-50" style="font-size: 12px">نسبت عکس‌ها باید 1 به 1 و فرمت آن jpg باشد</div>

        <div class="w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center flex-column position-relative">
                <div class="border border-dark position-relative overflow-hidden d-flex align-items-center justify-content-center rounded-3 me-4" style="width: 100px ; height: 100px">
                    <p class="bi-plus-square-dotted position-absolute text-dark" style="font-size: 20px"> اصلی</p>
                    <input  type="file" name="mainImage" class="position-absolute opacity-0 w-100 h-100">
                </div>
                @error('mainImage')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 10px ; right: 10px"></div>@enderror

            </div>


            <div class="d-flex align-items-center justify-content-center flex-column position-relative">
                <div class="border border-dark position-relative overflow-hidden d-flex align-items-center justify-content-center rounded-3 ms-4" style="width: 100px ; height: 100px">
                    <p class="bi-plus-square-dotted position-absolute text-dark" style="font-size: 20px"> آلبوم</p>
                    <input multiple type="file" name="image[]" class="position-absolute opacity-0 w-100 h-100">

                </div>
                @error('image')<div class="bg-danger position-absolute rounded-circle" style="width:  10px ; height: 10px ; top: 10px ; right: 32px"></div>@enderror

            </div>

        </div>

    </div>




    <div class="w-100 py-4 mt-5">
        <button class="btn btn-success m-auto d-block"> ایجاد </button>
    </div>





</form>



</div>









<div class="optionId d-none">
    <div class="text-secondary  bg-warning mt-1"></div>
@foreach($groups as $group)
    @if($group->child !='[]')

    @else
        <div  class="text-secondary option{{$group->id}} bg-warning mt-1">
            {{$group->id}}{{$group->parent !='[]' ? '/' : ''}}
            @if($group->parent)
                @foreach($group->parent as $group)
                    {{$group->id}}{{$group->parent !='[]' ? '/' : ''}}
                    @if($group->parent)
                        @foreach($group->parent as $group)
                            {{$group->id}}{{$group->parent !='[]' ? '/' : ''}}
                            @if($group->parent)
                                @foreach($group->parent as $group)
                                    {{$group->id}}{{$group->parent !='[]' ? '/' : ''}}
                                    @if($group->parent)
                                        @foreach($group->parent as $group)
                                            {{$group->id}}{{$group->parent !='[]' ? '/' : ''}}
                                            @if($group->parent)
                                                @foreach($group->parent as $group)
                                                    {{$group->id}}{{$group->parent !='[]' ? '/' : ''}}
                                                    @if($group->parent)
                                                        @foreach($group->parent as $group)
                                                            {{$group->id}}{{$group->parent !='[]' ? '/' : ''}}
                                                            @if($group->parent)
                                                                @foreach($group->parent as $group)
                                                                    {{$group->id}}
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

    let adddd = document.querySelector('.adddd');

    adddd.innerHTML = '';


    let array = [];
    let arrayId = [];

    let sellect = document.querySelector('.sellect');
    let selectLength = sellect.childNodes.length;



    let optionId = document.querySelector('.optionId');
    let selectLengthoptionId = optionId.childNodes.length;



    for(i=0 ; i<selectLength ; i++){
        if(i % 2 === 0){
        }else {
            let innerOption = sellect.childNodes[i].text;
            let innerOptionId = optionId.childNodes[i].innerText;
            array.push(innerOption);
            arrayId.push(innerOptionId);
        }

    }


</script>



<script>

    let oneOptionF = document.querySelector('.optionF');
    oneOptionF.addEventListener('click' , function(e){
        let adddd = document.querySelector('.adddd');

        adddd.innerHTML = '';
    });


@foreach($groups as $group)
    @if($group->child !='[]')

    @else



            let oneOption{{$group->id}} = document.querySelector('.option{{$group->id}}');

            oneOption{{$group->id}}.addEventListener('click' , function (event){
                let adddd = document.querySelector('.adddd');

                    adddd.innerHTML = '';

                    let nnn = event.target.text;

                    let indexNumber = array.indexOf(nnn);

                    let IdGroup = arrayId[indexNumber].split('/');

                    for (i=0 ; i<IdGroup.length ; i++){
                        const newOption = document.createElement("option");
                        newOption.innerHTML = IdGroup[i];
                        newOption.value = IdGroup[i];
                        newOption.setAttribute("selected" , true);
                        adddd.appendChild(newOption);

                    }

            })

    @endif
@endforeach

    </script>


@endsection

@vite(['resources/js/admin/products/create.js'])
