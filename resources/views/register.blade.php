<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{secure_asset('assets/css/register.css') }}">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                <img src="{{secure_asset('assets/img/Logo_Food_For_All_1 1.png') }}" alt="">
                <div class="text">
                    <h2>@lang('register.platform_description')</h2>
                    <p>{{ __('register.kindness_quote') }}</p>
                </div>
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <header>{{ __('register.registration') }}</header>
                    @if ($errors->any())
                    <div style="background-color: #fff3cf; padding: 0.5rem; border-radius: 0.5rem">
                        @foreach ($errors->all() as $error)
                       <span style="color: black">{{$error}}</span> 
                    @endforeach</div><br>
                    @endif
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="input-field">
                            <input type="text" class="input" name="name" required autocomplete="off">
                            <label for="name">{{ __('register.name') }}</label>
                        </div>
                        <div class="input-field">
                            <input type="email" class="input" name="email" required autocomplete="off">
                            <label for="email">{{ __('register.email') }}</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" name="password" required>
                            <label for="password">{{ __('register.password') }}</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" name="conPassword" required>
                            <label for="conPassword">{{ __('register.confirm_password') }}</label>
                        </div>
                        <div class="cekb">
                            <input type="checkbox" class="cek" name="terms" required>
                            <label for="cekbok">{{ __('register.i_accept') }} <u>{{ __('register.terms_and_conditions') }}</u></label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="{{ __('register.register') }}">       
                        </div>
                    </form>
                    <div class="signin">
                        <span>{{ __('register.already_have_account') }}<a href="{{ route('login') }}">Log in</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>