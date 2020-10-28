
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card h-100" style="background: #fefefe;">

            <div class="d-flex justify-content-center cover-image-position">
                @if($coverimage)
                    <img src="{{asset($coverimage->cover_image)}}" class="img-fluid cover-image-fade">
                @else
                    <img src="{{asset('/')}}front-end/images/coverImage/hero-bg-1.jpg" class="img-fluid cover-image-fade">
                @endif
                <div class="cover-middle-btn">
                    <button class="change-cover-image btn btn-sm rounded btn-light" data-toggle="modal" data-target="#changeCoverImage">Change Cover Image</button>
                </div>
            </div>

            <div class="profile-image-position profile-image">
                @if($profileImage)
                    <img src="{{asset($profileImage->profile_image)}}" class="img-fluid rounded-circle m-auto img-thumbnail profile-image-fade">
                @else
                    <img src="{{asset('/')}}front-end/images/profileImage/photo.jpg" class="img-fluid rounded-circle m-auto img-thumbnail profile-image-fade">
                @endif
                <div class="profile-middle-btn">
                    <button class="change-profile-image btn btn-sm rounded btn-light" data-toggle="modal" data-target="#changeProfileImage">Change Profile Image</button>
                </div>
            </div>

            <div class="name-name">
                <h5 class="m-auto">{{Session::get('customerName')}}</h5>
                @if($customerAddress)
                <p class="text-muted m-auto">{{$customerAddress->division_name}}, {{$customerAddress->district_name}}, {{$customer->country}}</p>
                @else
                    <p class="text-muted m-auto">{{$customer->division}}, {{$customer->district}}, {{$customer->country}}</p>
                @endif
                <p class="text-muted m-auto">joined, {{\Carbon\Carbon::parse($customer->created_at)->isoFormat('MMM Do, YYYY')}}</p>
            </div>

        </div>

        <div class="main-header">
            <div class="card">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('myPhotos')}}">My Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('myAudios')}}">My Audios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('myVideos')}}">My Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('myTextStatus')}}">My Text Status</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



