@extends('front-end.master-profile')

@section('title')
    My Audios - Social App
@endsection

@section('profileBody')
    <div class="row text-center mt-5">
       @foreach($audioPost as $postAudio)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 ">
                <div class="card border-success" style="max-width: 18rem; background-color:#282828;border: none">
                    <div class="card-header bg-transparent border-success embed-responsive " >
                        <p style="color: white; padding: 0;margin: 0; font-size: 0.8rem" ><b>{{$postAudio->audio_title}}</b></p>
                        <p style="color: white;padding: 0;margin: 0;font-size: 0.8rem">{{$postAudio->audio_artist}}</p>
                    </div>
                    <div class="card-footer bg-transparent border-success embed-responsive" style="color: red">
                        <audio class="embed-responsive-item" src="{{$postAudio->post_audio}}" controls></audio>>
                    </div>

                </div>
                <form method="POST" action="{{route('deleteAudio')}}">
                    @csrf
                    <input type="hidden" name="postAudioId"  value="{{$postAudio->id}}">
                    <input type="submit" name="btn" class="btn btn-outline-dark btn-block btn-sm" value="Delete" onclick="return confirm('Are you sure, you want to delete this audio!!')">
                </form>
            </div>
        @endforeach
    </div>
@endsection
