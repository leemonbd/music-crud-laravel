<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Social App Forget Password</title>
    <link rel="icon" type="image/png" href="{{asset('/')}}front-end/images/favicon.png">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/bootstrap.css"/>
</head>
<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST" action="{{--{{ route('') }}--}}">
                @csrf
                <div class="mx-auto text-center my-4">
                    <a class="navbar-brand mx-auto flex-fill text-center" href="{{route('socialAppLogin')}}" >
                        <img src="{{asset('/')}}front-end/images/logo.png" alt="logo" class="img-fluid">
                    </a>
                    <h2 class="my-3">Reset Password</h2>
                </div>
                <p class="text-muted">Enter your email address and we'll send you an email with instructions to reset your password</p>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
                </div>
               <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
                <p class="mt-5 mb-3 text-muted">© 2020</p>
            </form>
        </div>
    </div>
    <script src="{{asset('/')}}front-end/js/jquery-3.4.1.js"></script>
    <script src="{{asset('/')}}front-end/js/popper.js"></script>
    <script src="{{asset('/')}}front-end/js/bootstrap.js"></script>
</body>
</html>

