<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <header>Welcome Back!</header>
                    <h1>Hey, Enter your detail to get sign into your account</h1>
                    <div class="input-field">
                        <input type="text" class="input" id="email" required autocomplete="off">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" id="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot Password or Email?</a>
                    </div>
                    <br>
                    <div class="cekb">
                        <input type="checkbox" class="cek" id="checkbox" required>
                        <label for="cekbok"><u>Remember Me?</u></label>
                    </div>
                    <br>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Login">
        
                    </div>
                    <div class="signin">
                        <span>Do not have an account? <a href="#">Register</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>