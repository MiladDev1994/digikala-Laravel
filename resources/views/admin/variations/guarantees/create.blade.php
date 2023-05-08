<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/bootstrap.min.css', 'resources/css/app.css','resources/css/font.css', 'resources/js/app.js'])

    <title>Document</title>
</head>
<body>



<h1>ایجاد  گارانتی  </h1>


<a href="{{route('variations.guarantees.create')}}"> گارانتی ها </a>


<form method="post" action="{{route('variations.guarantees.store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="text" name="name">

    <input type="file" name="document">

    <select name="period">
        <option value="6 ماهه"> 6 ماهه </option>
        <option value="12 ماهه"> 12 ماهه </option>
        <option value="18 ماهه"> 18 ماهه </option>
        <option value="24 ماهه"> 24 ماهه </option>
        <option value="36 ماهه"> 36 ماهه </option>
        <option value="48 ماهه"> 48 ماهه </option>
    </select>

    <button class="btn btn-primary"> ایجاد </button>
</form>
</body>
</html>


@if(count($errors) > 0)
    @foreach($errors->all() as $eror)
        {{$eror}}
    @endforeach
@endif
