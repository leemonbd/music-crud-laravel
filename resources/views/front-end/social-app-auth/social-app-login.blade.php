<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Social App Login</title>
    <link rel="icon" type="image/png" href="{{asset('/')}}front-end/images/favicon.png">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/bootstrap.css"/>
</head>
<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">

            <form class="col-xl-3 col-lg-4 col-md-6 col-10 mx-auto text-center" method="POST" action="{{route('newLogin')}}">
                @csrf
                <a class="navbar-brand mx-auto flex-fill text-center" href="{{route('socialAppLogin')}}">
                    <img src="{{asset('/')}}front-end/images/logo.png" alt="logo" class="img-fluid" style="width: 50%">
                </a>
                <h1 class="h6 mb-3">Sign in</h1>
                <h3 class="text-danger">{{Session::get('message')}}</h3>
                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" name="email" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" name="password" required autocomplete="current-password">
                </div>
                {{--<div class="form-group">
                    <label>
                        <input type="checkbox" value="remember-me" name="remember"> Stay logged in
                    </label>
                </div>--}}
                <div class="checkbox">
                    <p>Didn't have account? <a href="{{route('socialAppRegister')}}">Click</a> here</p>
                </div>
                <button class="btn btn-lg btn-primary btn-block" name="btn" type="submit">Let me in</button>
                <p class="mt-5 mb-3 text-muted">© 2020</p>
            </form>
        </div>
    </div>
    <script src="{{asset('/')}}front-end/js/jquery-3.4.1.js"></script>
    <script src="{{asset('/')}}front-end/js/popper.js"></script>
    <script src="{{asset('/')}}front-end/js/bootstrap.js"></script>
</body>
</html>
