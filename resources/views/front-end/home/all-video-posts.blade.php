@extends('front-end.master-home')

@section('title')
    All Profile Photos - World Music
@endsection

@section('homeBody')
    @if($allVideoPost)
    @foreach($allVideoPost as $allVideoPosts)
        <div class="row mt-2">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <p class="float-left pt-3"><b>{{$allVideoPosts->name}}</b><span class="text-muted pl-1">posted a video</span></p>
                    </div>
                    <div class="card-body">
                        <div class="card-header">{{$allVideoPosts->video_title}}</div>
                        <a href="{{$allVideoPosts->post_video}}">
                        <div class="card-header">
                            <div class="embed-responsive embed-responsive-16by9 ">
                                <video class="embed-responsive-item" src="{{$allVideoPosts->post_video}}" controls poster="{{$allVideoPosts->bg_image}}"></video>
                            </div>
                        </div>
                        </a>
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
        <div class="col-xl-8 d-flex justify-content-center">{{$allVideoPost->links()}}</div>
        <div class="col-xl-2"></div>
    </div >
@endsection
