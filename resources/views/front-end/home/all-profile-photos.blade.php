@extends('front-end.master-home')

@section('title')
    All Profile Photos - World Music
@endsection

@section('homeBody')
    @foreach($profileImagePost as $profileImagePosts)
    <div class="row text-center mt-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <p class="float-left pt-3"><b>{{$profileImagePosts->name}}</b><span class="text-muted pl-1">updated his profile photo</span></p>
                </div>
                <div class="card-body">
                    <a href="{{asset($profileImagePosts->profile_image)}}">
                        <img src="{{asset($profileImagePosts->profile_image)}}" class="img-fluid profile-image-fade">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
    @endforeach
    <div class="row mt-2 mb-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 d-flex justify-content-center">{{$profileImagePost->links()}}</div>
        <div class="col-xl-2"></div>
    </div >


@endsection
