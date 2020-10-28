
@extends('front-end.master-profile')

@section('title')
    Profile - Social App
@endsection

@section('profileBody')
    <div class="row pt-5" style="background: #fefefe;">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
            @if($albumPostTwelve)
            <div class="card">
                <div class="card-header">
                    <span><h5 class="d-flex justify-content-center">Photos</h5></span>
                </div>
                <div class="card-body">
                    @foreach($albumPostTwelve as $postAlbumTwelve)
                        <a href="{{asset($postAlbumTwelve->post_image_album)}}">
                            <img src="{{asset($postAlbumTwelve->post_image_album)}}" class="rounded float-left img-fluid img-thumbnail" style="height: 100px;width: 100px">
                        </a>
                    @endforeach
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="{{route('allAlbumsPhotos')}}">More...</a>
                </div>
            </div>
            <br>
            @endif

            @if($videoPostFour)
            <div class="card">
                <div class="card-header">
                    <span><h5 class="d-flex justify-content-center">Videos</h5></span>
                </div>
                <div class="card-body">
                    @foreach($videoPostFour as $postVideoFour)
                        <a href="{{$postVideoFour->post_video}}">
                        <img src="{{asset($postVideoFour->bg_image)}}" class="float-left img-thumbnail img-fluid">
                        </a>
                    @endforeach
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="{{route('myVideos')}}">More...</a>
                </div>
            </div>
            <br>
                @endif

            <div class="card">
                <div class="card-header">
                    <span><h5 class="d-flex justify-content-center">Audios</h5></span>
                </div>
                <div class="card-body">
                    @foreach($audioPostFour as $postAudioFour)
                            <div class="card" style=" background-color:#282828;border: none">
                                <div class="card-header bg-transparent border-success embed-responsive " >
                                    <p style="color: white; padding: 0;margin: 0; font-size: 0.8rem" ><b>{{$postAudioFour->audio_title}}</b></p>
                                    <p style="color: white;padding: 0;margin: 0;font-size: 0.8rem">{{$postAudioFour->audio_artist}}</p>
                                </div>
                                <div class="card-footer bg-transparent border-success embed-responsive" style="color: red">
                                    <audio class="embed-responsive-item" src="{{$postAudioFour->post_audio}}" controls></audio>>
                                </div>
                            </div>
                        <br>
                    @endforeach
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="{{route('myAudios')}}">More...</a>
                </div>
            </div>
            <br>

        </div>

        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
            <div class="card" style="background: #8a94a9;">
                <div class="card-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-sm btn-light" value="Post Text" data-toggle="modal" data-target="#postText">
                    <input type="submit" class="btn btn-sm btn-light ml-1" value="Post Image" data-toggle="modal" data-target="#postImage">
                    <input type="submit" class="btn btn-sm btn-light ml-1" value="Photo Album" data-toggle="modal" data-target="#photoAlbum">
                    <input type="submit" class="btn btn-sm btn-light ml-1" value="Post Video" data-toggle="modal" data-target="#postVideo">
                    <input type="submit" class="btn btn-sm btn-light ml-1" value="Post Audio" data-toggle="modal" data-target="#postAudio">
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <p class="text-center text-muted m-auto">Your Recent Activity</p>
                </div>
            </div>
            <br>
            @if($textPost)
            <div class="card">
                <div class="card-header">
                    @if($profileImage)
                        <img src="{{$profileImage->profile_image}}" class="rounded-circle float-left" style="height: 50px;width: 50px">
                    @else
                        <img src="{{asset('/')}}front-end/images/profileImage/photo.jpg" class="rounded-circle float-left" style="height: 50px;width: 50px">
                    @endif

                    <p class="float-left pt-3 pl-2"><b>{{Session::get('customerName')}}</b><span class="text-muted pl-1">posted a status</span></p>
                </div>
                <div class="card-body">
                    <p>{{$textPost->post_text}}</p>
                </div>
            </div>
            <br>
            @endif
            @if($imagePost)
            <div class="card">
                <div class="card-header">
                    @if($profileImage)
                        <img src="{{$profileImage->profile_image}}" class="rounded-circle float-left" style="height: 50px;width: 50px">
                    @else
                        <img src="{{asset('/')}}front-end/images/profileImage/photo.jpg" class="rounded-circle float-left" style="height: 50px;width: 50px">
                    @endif
                    <p class="float-left pt-3 pl-2"><b>{{Session::get('customerName')}}</b><span class="text-muted pl-1">posted an image</span></p>
                </div>
                <div class="card-body">
                    <div class="card-header">{{$imagePost->image_title}}</div>
                    <div class="card-body">
                        <a href="{{asset($imagePost->post_image)}}"><img src="{{asset($imagePost->post_image)}}" class="img-fluid profile-image-fade"></a>
                    </div>
                </div>
            </div>
            <br>
            @endif
            @if($videoPost)
            <div class="card">
                <div class="card-header">
                    @if($profileImage)
                        <img src="{{$profileImage->profile_image}}" class="rounded-circle float-left" style="height: 50px;width: 50px">
                    @else
                        <img src="{{asset('/')}}front-end/images/profileImage/photo.jpg" class="rounded-circle float-left" style="height: 50px;width: 50px">
                    @endif
                    <p class="float-left pt-3 pl-2"><b>{{Session::get('customerName')}}</b><span class="text-muted pl-1">posted a video</span></p>
                </div>
                <div class="card-body">
                    <div class="card-header">{{$videoPost->video_title}}</div>
                    <div class="card-header">
                        <div class="embed-responsive embed-responsive-16by9 ">
                            <video class="embed-responsive-item" src="{{$videoPost->post_video}}" controls poster="{{$videoPost->bg_image}}"></video>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endif
            @if($audioPost)
            <div class="card">
                    <div class="card-header">
                        @if($profileImage)
                            <img src="{{$profileImage->profile_image}}" class="rounded-circle float-left" style="height: 50px;width: 50px">
                        @else
                            <img src="{{asset('/')}}front-end/images/profileImage/photo.jpg" class="rounded-circle float-left" style="height: 50px;width: 50px">
                        @endif
                        <p class="float-left pt-3 pl-2"><b>{{Session::get('customerName')}}</b><span class="text-muted pl-1">posted an audio</span></p>
                    </div>
                    <div class="card-body">
                        <div class="embed-responsive">
                            <div class="card-header">
                                <p><b class="text-uppercase">{{$audioPost->audio_title}}</b><br>
                                    by <strong>{{$audioPost->audio_artist}}</strong></p>
                            </div>
                            <div class="card-footer">
                                <audio class="embed-responsive-item" src="{{$audioPost->post_audio}}" controls></audio>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endif

            @if($albumPost && $albumPostLast)
                <div class="card w-auto h-auto">
                    <div class="card-header">
                        @if($profileImage)
                            <img src="{{$profileImage->profile_image}}" class="rounded-circle float-left" style="height: 50px;width: 50px">
                        @else
                            <img src="{{asset('/')}}front-end/images/profileImage/photo.jpg" class="rounded-circle float-left" style="height: 50px;width: 50px">
                        @endif
                        <p class="float-left pt-3 pl-2"><b>{{Session::get('customerName')}}</b><span class="text-muted pl-1">posted an album</span></p>
                    </div>
                    <div class="card-header">
                        @if($albumPostLast)
                            <span><h5 class="d-flex justify-content-center">{{$albumPostLast->album_title}}</h5></span>
                        @endif
                    </div>
                    <div class="card-body">
                        @foreach($albumPost as $postAlbum)
                            <a href="{{asset($postAlbum->post_image_album)}}">
                                <img src="{{asset($postAlbum->post_image_album)}}" class="rounded float-left img-thumbnail" style="height: 250px;width: 50%">
                            </a>
                        @endforeach
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{route('allAlbumsPhotos')}}">All Photos</a>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection



