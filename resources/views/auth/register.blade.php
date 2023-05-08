<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Document</title>
    @vite(['resources/css/bootstrap.min.css', 'resources/css/login.css','resources/css/font.css'])

</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh">

<form method="POST" action="{{ route('register', ['back' => session('redirect')]) }}" class="position-relative form-control  p-5  shadow d-flex align-items-center justify-content-center flex-column">
                        @csrf

    <a href="{{url(session('redirect'))}}" class="text-dark">
        <i class="position-absolute bi-arrow-right"  style="font-size: 25px; right: 10px; top: 10px" ></i>
    </a>
{{--{{session('redirect')}}--}}
    <a href="{{url('/login' , [session(['Bredirect'=>session('redirect')])] )}}" class="text-secondary btn btn-light border-1 border position-absolute" style=" left: 10px; top: 10px; text-decoration: none; color: #007d97">
        ورود
    </a>

                                <input id="name" type="text" placeholder="نام کاربری" style="outline: none" class="mt-5 shadow text-center input-group-text w-100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                                <input id="email" type="email" placeholder="ایمیل " style="outline: none" class="mt-4 shadow text-center input-group-text w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                                <input id="password" type="password"  placeholder="رمز عبور" style="outline: none" class="mt-4 shadow text-center input-group-text w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password-confirm" type="password" placeholder="تکرار رمز" style="outline: none" class="mt-4 shadow text-center input-group-text w-100" name="password_confirmation" required autocomplete="new-password">


                                <button type="submit" class="btn btn-primary mt-5 shadow">
                                    {{ __('ثبت نام') }}
                                </button>

                    </form>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
