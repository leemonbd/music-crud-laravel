<nav class="navbar navbar-expand-lg navbar-light sticky-top header-navbar-color">
    <a class="navbar-brand" href="{{route('profile')}}"><img src="{{asset('/')}}front-end/images/logo.png" alt="logo" class="img-fluid" style="width: 40%"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        </ul>
        <ul class="navbar-nav mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{route('allProfilePhotos')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}">Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    @if($profileImage)
                        <img src="{{$profileImage->profile_image}}" class="rounded-circle float-left" style="height: 30px;width: 30px">
                    @else
                        <img src="{{asset('/')}}front-end/images/profileImage/photo.jpg" class="rounded-circle float-left" style="height: 30px;width: 30px">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><p class=""><b>{{Session::get('customerName')}}</b></p></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('myAccount',['customerId'=>Session::get('customerId')])}}">My Account</a>
                    <a class="dropdown-item" href="{{route('customerLogout')}}">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

