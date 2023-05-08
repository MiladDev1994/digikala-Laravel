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



<h1> ایحاد رنگ </h1>

<form method="post" action="{{route('variations.colors.store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="text" name="name">
    <input type="color" name="color">

    <button class="btn btn-primary"> ابجاد </button>
</form>



</body>
</html>
@if(count($errors) > 0)
    @foreach($errors->all() as $eror)
        {{$eror}}
    @endforeach
@endif
