@extends('admin.admin_app')

@section('admin')

    <h4 class="text-center py-2 opacity-50">سایز‌ها</h4>


    <form method="post" action="{{route('admin.variations.num.store')}}" class="mt-4">
        @csrf
        <div class="d-flex align-items-center justify-content-center py-2">
            <input name="number" type="text" class="input-group-text bg-dark text-light me-3 shadow" placeholder="عنوان تعداد...." style="width: 300px ; border: none ; outline: none">
        </div>
        @error('number') <div class="text-danger text-center" style="font-size: 13px">عنوان تعداد نباید تکراری باشد</div> @enderror
        <button class="btn btn-success m-auto d-block mt-4 shadow">ایجاد</button>
    </form>


    <div class="d-flex align-items-center justify-content-center p-4">
        <div class="border border-dark p-4 w-100 shadow" style="border-radius: 10px">
            @foreach($numbers as $number)
                <div class="border border-dark rounded-3 shadow-sm float-start m-2 d-flex align-items-center justify-content-center p-2" style="width: 170px ">
                    {{$number->number}}
                </div>
            @endforeach
        </div>
    </div>

@endsection
@vite(['resources/js/admin/products/create.js'])

