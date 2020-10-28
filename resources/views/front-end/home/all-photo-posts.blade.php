@extends('front-end.master-home')

@section('title')
    All Profile Photos - World Music
@endsection

@section('homeBody')
    @if($allImagePost)
    @foreach($allImagePost as $allImagePosts)
        <div class="row mt-2">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <p class="float-left pt-3"><b>{{$allImagePosts->name}}</b><span class="text-muted pl-1">posted an image</span></p>
                    </div>
                    <div class="card-body">
                        <div class="card-header">{{$allImagePosts->image_title}}</div>
                        <div class="card-body">
                            <a href="{{asset($allImagePosts->post_image)}}"><img src="{{asset($allImagePosts->post_image)}}" class="img-fluid profile-image-fade"></a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-xl-2"></div>
        </div>
    @endforeach
    @endif
    <div class="row mt-2 mb-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 d-flex justify-content-center">{{$allImagePost->links()}}</div>
        <div class="col-xl-2"></div>
    </div >

@endsection
