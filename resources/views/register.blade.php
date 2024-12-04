<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                <img src="{{ asset('assets/img/Logo_Food_For_All_1 1.png') }}" alt="">
                <div class="text">
                    <h2>Digital platform for sharing with those in need</h2>
                    <p>"Even the smallest acts of kindness—like a smile, a shared meal, or a helping hand—have the power to ripple outward, inspiring others and creating waves of meaningful change in our communities."</p>
                </div>
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <header>Registration</header>
                    <div class="input-field">
                        <input type="text" class="input" id="name" required autocomplete="off">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" id="email" required autocomplete="off">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" id="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" id="conPassword" required>
                        <label for="conPassword">Confirmation Password</label>
                    </div>
                    <div class="cekb">
                        <input type="checkbox" class="cek" id="checkbox" required>
                        <label for="cekbok">I accept <u>terms and condition</u></label>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Register">
        
                    </div>
                    <div class="signin">
                        <span>Already have an account? <a href="#">Log in</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>