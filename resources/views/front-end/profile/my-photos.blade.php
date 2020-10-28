@extends('front-end.master-profile')

@section('title')
    My Photos - Social App
@endsection

@section('profileBody')
    <div class="row text-center mt-5">
        @if($profileImage)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{route('profilePhotos')}}">
                <div class="card w-auto ">
                    <img src="{{asset($profileImage->profile_image)}}" alt="profile image" class="img-fluid" style="height: 200px;">
                    <div class="card-footer">
                        <span>Profile Photos</span>
                    </div>
                </div>
                </a>
            </div>
        @endif
        @if($coverimage)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{route('coverPhotos')}}">
                    <div class="card w-auto " >
                        <img src="{{asset($coverimage->cover_image)}}" alt="cover image" class="img-fluid" style="height: 200px;">
                        <div class="card-footer">
                            <span>Cover Photos</span>
                        </div>
                    </div>
                </a>
            </div>
            @endif


            @if($imagePost)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{route('allPhotos')}}">
                    <div class="card w-auto " >
                        <img src="{{asset($imagePost->post_image)}}" alt="my image" class="img-fluid" style="height: 200px;">
                        <div class="card-footer">
                            <span>My Photos</span>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if($albumPost)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <a href="{{route('allAlbumsPhotos')}}">
                <div class="card w-auto" >
                    <img src="{{asset($albumPost->post_image_album)}}" alt="my image" class="img-fluid" style="height: 200px;">
                    <div class="card-footer">
                        <span>All Albums Photos</span>
                    </div>
                </div>
            </a>
        </div>
            @endif
    </div>
@endsection
