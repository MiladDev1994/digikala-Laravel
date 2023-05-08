@extends('.admin.admin_app')
@section('admin')

    <h1>admin</h1>

    <a href="{{route('home')}}">بازگشت به سایت </a>
<br/>

    <a href="{{route('categories.index')}}">دسته بندی </a>

    <br/>

    <a href="{{route('home.slider')}}">اسلایدر هوم </a>

    <br/>

    <a href="{{route('variations.colors')}}">رنگ ها </a>

    <br/>

    <a href="{{route('variations.sizes')}}">سایزها </a>

    <br/>

    <a href="{{route('variations.weights')}}"> وزن ها </a>

    <br/>

    <a href="{{route('variations.volumes')}}"> حجم ها </a>

    <br/>

    <a href="{{route('variations.numbers')}}"> تعداد </a>

    <br/>


    <a href="{{route('variations.guarantees')}}"> گارانتی ها </a>

    <br/>

    <a href="{{route('variations.brands')}}"> برندها ها </a>

    <br/>

    <a href="{{route('products')}}"> محصولات </a>

    <br/>

    <a href="{{route('products.variations')}}"> تنوع محصولات </a>

    <br/>

    <a href="{{route('home.createspecialNarrow.create')}}"> شگفت متصل به گروه </a>


    <br/>

    <a href="{{route('home.createspecialFour.create')}}"> شگفت 4 تایی </a>


    <br/>

    <a href="{{route('home.createspecialTwo.create')}}"> شگفت 2 تایی </a>

    <br/>

    <a href="{{route('home.createspecialOne.create')}}"> شگفت تکی </a>

    <br/>

    <a href="{{route('article')}}"> مقالات </a>

    <br/>

    <a href="{{route('home.createspecialHead.create')}}"> شگفت بالا </a>

    <br/>

    <a href="{{route('home.createspecialHead.create')}}"> انتخاب بنر </a>

    <br/>

    <a href="{{route('home.showarticle.show')}}"> نمایش مقاله </a>



@endsection



