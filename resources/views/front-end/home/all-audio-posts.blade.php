@extends('front-end.master-home')

@section('title')
    All Profile Photos - World Music
@endsection

@section('homeBody')
    @if($allAudioPost)
    @foreach($allAudioPost as $allAudioPosts)
        <div class="row text-center mt-2">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <p class="float-left pt-3"><b>{{$allAudioPosts->name}}</b><span class="text-muted pl-1">posted an audio</span></p>
                    </div>
                    <div class="card-body">
                        <div class="embed-responsive">
                            <div class="card-header">
                                <p><b class="text-uppercase">{{$allAudioPosts->audio_title}}</b><br>
                                    by <strong>{{$allAudioPosts->audio_artist}}</strong></p>
                            </div>
                            <div class="card-footer">
                                <audio class="embed-responsive-item" src="{{$allAudioPosts->post_audio}}" controls></audio>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    @endforeach
    @endif
    <div class="row mt-2 mb-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 d-flex justify-content-center">{{$allAudioPost->links()}}</div>
        <div class="col-xl-2"></div>
    </div >
@endsection
