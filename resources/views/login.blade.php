<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{secure_asset('assets/css/login.css') }}">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="{{secure_asset('assets/css/login.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <header>{{ __('login.welcome_back') }}</header>
                    <h1>{{ __('login.login_prompt') }}</h1>
                    @if ($errors->any())
                        <div style="background-color: #e8c872; padding: 0.5rem; border-radius: 0.5rem">
                            @foreach ($errors->all() as $error)
                           <span >{{$error}}</span> 
                        @endforeach</div><br>
                    @endif
                    <form action="{{ secure_url('login') }}" method="POST">
                        @csrf
                        <div class="input-field">
                            <input type="email" class="input" id="email" name="email" required autocomplete="off">
                            <label for="email">{{ __('login.email') }}</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required>
                            <label for="password">{{ __('login.password') }}</label>
                        </div>
                        <div class="forgot">
                            <a href="#">{{ __('login.forgot_password') }}</a>
                        </div>
                        <br>
                        <div class="cekb">
                            <input type="checkbox" class="cek" id="checkbox" required>
                            <label for="cekbok"><u>{{ __('login.remember_me') }}</u></label>
                        </div>
                        <br>
                        <div class="input-field">
                            <input type="submit" class="submit" value="{{ __('login.login') }}">
                        </div>
                    </form>
                    <div class="signin">
                        <span>Do not have an account? <a href="{{ route('register') }}">Register</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>