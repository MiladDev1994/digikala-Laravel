@extends('admin.admin_app')

@section('admin')
    <style>
        .hovver{
            transition: 0.3s;
            cursor: pointer;
        }
        .hovver:hover{
            color: #ff9494 !important;
        }
    </style>

<h4 class="text-center py-2 opacity-50">درخواست‌ها</h4>


<div class="Box p-4">
    @foreach($requests as $request)
        <div class="d-flex align-items-center justify-content-start p-2 position-relative" style="border-radius: 10px ; background-color: #313131 ; border: 1px solid rgba(44,44,44,0.78) ; margin-top: 10px">
            @if($request->subject == 'افزودن دسته')
                <div class="text-center text-info hovver" data-bs-toggle="modal" data-bs-target="#exampleModal{{$request->id}}" style="width: 60px ; text-decoration: none ; cursor: pointer">{{$request->seller_id}}</div>
                <a href="{{route('admin.categories')}}" target="_blank" class="text-center text-info hovver" style="width: 150px ; text-decoration: none ; white-space: nowrap">{{$request->subject}}</a>
                <div class="" style="width: 100px ; text-decoration: none ; white-space: nowrap">{{$request->name}}</div>
            @elseif($request->subject == 'افزودن برند')
                <div class="text-center text-info hovver" data-bs-toggle="modal" data-bs-target="#exampleModal{{$request->id}}" style="width: 60px ; text-decoration: none ; cursor: pointer">{{$request->seller_id}}</div>
                <a href="{{route('admin.brands')}}" target="_blank" class="text-center text-info hovver" style="width: 150px ; text-decoration: none ; white-space: nowrap">{{$request->subject}}</a>
                <div class="" style="width: 100px ; text-decoration: none ; white-space: nowrap">{{$request->name}}</div>
                <a href="{{url('images/'.$request->file)}}" target="_blank" class="" style="width: 100px ; text-decoration: none ; white-space: nowrap">
                    <img width="50%" src="{{url('images/'.$request->file)}}">
                </a>
                <textarea class="bg-dark text-light p-1" style="border: none ; outline: none ; height: 35px">{{$request->about}}</textarea>
            @elseif($request->subject == 'افزودن گارانتی')
                <div class="text-center text-info hovver" data-bs-toggle="modal" data-bs-target="#exampleModal{{$request->id}}" style="width: 60px ; text-decoration: none ; cursor: pointer">{{$request->seller_id}}</div>
                <a href="{{route('admin.warranties')}}" class="text-center text-info hovver" target="_blank" style="width: 150px ; text-decoration: none ; white-space: nowrap">{{$request->subject}}</a>
                <div class="" style="width: 150px ; text-decoration: none ; white-space: nowrap">{{$request->name}}</div>
                <a href="{{url('images/'.$request->file)}}" target="_blank" class="" style="width: 100px ; text-decoration: none ; white-space: nowrap">
                    <img width="50%" src="{{url('images/'.$request->file)}}">
                </a>
            @elseif($request->subject == 'افزودن عکس')
                <div class="text-center text-info hovver"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$request->id}}" style="width: 60px ; text-decoration: none ; cursor: pointer">{{$request->seller_id}}</div>
                <a href="{{url('http://127.0.0.1:8000/admin/products/addPic-'.$request->product_id)}}" class="text-center text-info hovver" target="_blank" style="width: 150px ; text-decoration: none ; white-space: nowrap">{{$request->subject}}</a>
                <a href="{{url('images/'.$request->file)}}" target="_blank" class="" style="width: 100px ; text-decoration: none ; white-space: nowrap">
                    <img width="50%" src="{{url('images/'.$request->file)}}">
                </a>
            @else
                <div class="text-center text-info hovver" data-bs-toggle="modal" data-bs-target="#exampleModal{{$request->id}}" style="width: 60px ; text-decoration: none ; cursor: pointer">{{$request->seller_id}}</div>
                <a class="text-center text-info hovver" style="width: 150px ; text-decoration: none ; white-space: nowrap">{{$request->subject}}</a>
                <div class="" style="width: 100px ; text-decoration: none ; white-space: nowrap">{{$request->name}}</div>
            @endif

            <a href="{{route('admin.requests.destroy' , $request->id)}}" class="bi-x-lg text-light position-absolute opacity-50 hovver" style="left: 10px"></a>

        </div>






        <div class="modal fade" id="exampleModal{{$request->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$request->id}}" aria-hidden="true">
            <div class="modal-dialog">

                <form method="post" action="{{route('admin.massage')}}" class="modal-content position-relative p-4 d-flex align-items-center justify-content-center flex-column" style="margin-top: 200px ; height: 250px ; background-color: #333333">
                   @csrf
                    <p class="text-center opacity-50">پاسخ به خواست</p>
                    <textarea name="text" placeholder="متن پیام" type="text" class="bg-dark text-light w-100 p-2 shadow rounded-3 mt-4" style="border: none ; outline: none"></textarea>
                    <input name="seller" type="hidden" value="{{$request->seller_id}}">
                    <button type="button" class="bi-x-lg btn text-light position-absolute" data-bs-dismiss="modal" style="left: 0 ; top: 5px"></button>
                    <button type="submit" class="btn btn-success d-block m-auto mt-4" data-bs-dismiss="modal" style="left: 0 ; top: 5px"> ارسال </button>
                </form>
            </div>
        </div>

    @endforeach
</div>


@endsection
@vite(['resources/js/admin/products/create.js'])
