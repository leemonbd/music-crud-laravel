@extends('front-end.master-home')

@section('title')
    All Text Status - World Music
@endsection

@section('homeBody')
    @foreach($allTextPost as $allTextPosts)
    <div class="row mt-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <p class="float-left pt-3"><b>{{$allTextPosts->name}}</b><span class="text-muted pl-1">posted a text status</span></p>
                </div>
                <div class="card-body">
                    <p>{{$allTextPosts->post_text}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
    @endforeach
    <div class="row mt-2 mb-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 d-flex justify-content-center">{{$allTextPost->links()}}</div>
        <div class="col-xl-2"></div>
    </div >
@endsection
