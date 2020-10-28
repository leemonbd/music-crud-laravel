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
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/magnific-popup.css"/>
</head>
<body>

    @include('front-end.includes.header')
    <div class="container">
        <div>
            @include('front-end.includes.big-header-userprofile')
        </div>

        @yield('profileBody')
    </div>

    <script src="{{asset('/')}}front-end/js/jquery-3.4.1.js"></script>
    <script src="{{asset('/')}}front-end/js/popper.js"></script>
    <script src="{{asset('/')}}front-end/js/jquery.magnific-popup.js"></script>
    <script src="{{asset('/')}}front-end/js/bootstrap.js"></script>
    <script src="{{asset('/')}}front-end/js/simple-sticky-sidebar.js"></script>
    <script src="{{asset('/')}}front-end/js/my.jquery.js"></script>
    <script type="text/javascript">
        simpleStickySidebar('.sidebar-inner', {
            container: '.sidebar',
            topSpace: document.querySelector('.main-header').getBoundingClientRect().height + 25, // or any no i.e 20
            bottomSpace : 25
        });
    </script>
</body>
</html>
