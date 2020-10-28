@extends('front-end.master-home')

@section('title')
    All Profile Photos - World Music
@endsection

@section('homeBody')
    @foreach($coverImagePost as $coverImagePosts)
    <div class="row text-center mt-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <p class="float-left pt-3"><b>{{$coverImagePosts->name}}</b><span class="text-muted pl-1">updated his cover photo</span></p>
                </div>
                <div class="card-body">
                    <a href="{{asset($coverImagePosts->cover_image)}}">
                        <img src="{{asset($coverImagePosts->cover_image)}}" class="img-fluid profile-image-fade">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
    @endforeach
    <div class="row mt-2 mb-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 d-flex justify-content-center">{{$coverImagePost->links()}}</div>
        <div class="col-xl-2"></div>
    </div >
@endsection
