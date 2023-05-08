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



                    <form  method="POST" action="{{ route('login' , ['back' => session('redirect')]) }}" class="position-relative form-control  p-5   shadow d-flex align-items-center justify-content-center flex-column">
                        @csrf

                        <a href="{{url(session('redirect'))}}" class="text-dark">
                            <i class="position-absolute bi-arrow-right"  style="font-size: 25px; right: 10px; top: 10px" ></i>
                        </a>

                        <a href="{{url('/register', [session(['Bredirect'=>session('redirect')])])}}" class="text-secondary btn btn-light border-1 border position-absolute" style=" left: 10px; top: 10px; text-decoration: none; color: #007d97">
                            ثبت نام
                        </a>
                                <input id="email" type="email" placeholder="milad@gmail.com" style="outline: none" class=" shadow text-center w-100  mt-5 input-group-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password" type="password" placeholder="123456789" style="outline: none"  class="shadow text-center my-4 w-100 input-group-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <div class="d-flex align-items-center - justify-content-between">
                                        <input class="form-check-input me-5 shadow" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('مرا بخاطر بسپار') }}
                                        </label>
                                    </div>


                                <button style="font-size: 18px" type="submit" class="shadow btn btn-primary my-4">
                                    {{ __('ورود') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="text-decoration: none" href="{{ route('password.request') }}">
                                        {{ __('رمز خود را فراموش کرده‌اید؟') }}
                                    </a>
                                @endif
                    </form>



<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
