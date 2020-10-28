@extends('front-end.master-profile')

@section('title')
    My Videos - Social App
@endsection

@section('profileBody')
    <div class="row text-center no-gutters mt-5 myVideos">
        @foreach($videoPost as $postVideo)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card h-100 ">
                    <a href="{{$postVideo->post_video}}">
                        <div class="card-body" style="background-color: black">
                            <div class="embed-responsive embed-responsive-16by9 " >
                                <video class="embed-responsive-item" src="{{$postVideo->post_video}}" controls poster="{{$postVideo->bg_image}}"></video>
                            </div>
                        </div>
                    </a>
                    <div>
                        <p class="text-black"><b>{{$postVideo->video_title}}</b></p>
                    </div>
                    <form method="POST" action="{{route('deleteVideo')}}">
                        @csrf
                        <input type="hidden" name="postVideoId"  value="{{$postVideo->id}}">
                        <input type="submit" name="btn" class="btn btn-outline-dark btn-block btn-sm" value="Delete" onclick="return confirm('Are you sure, you want to delete this video!!')">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <br>
@endsection
