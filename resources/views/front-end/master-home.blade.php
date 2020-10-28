<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('/')}}front-end/images/favicon.png">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/bootstrap.css"/>
</head>
<body>

    @include('front-end.includes.header')
    @include('front-end.includes.header-home')
    <div class="container">
        @yield('homeBody')
    </div>

    <script src="{{asset('/')}}front-end/js/jquery-3.4.1.js"></script>
    <script src="{{asset('/')}}front-end/js/popper.js"></script>
    <script src="{{asset('/')}}front-end/js/bootstrap.js"></script>

</body>
</html>
