@extends('front-end.master-profile')

@section('title')
    My Text Status - Social App
@endsection

@section('profileBody')
    <div class="row mt-5">
        @foreach($allTextPosts as $allTextPost)
            <div class="col-xl-2"></div>
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header navbar">
                        <p>{{\Carbon\Carbon::parse($allTextPost->created_at)->isoFormat('MMM Do, YYYY - hh:mm:ss A')}}</p>
                        <div class="dropdown">
                            <a  href="#"  role="button" class="btn btn-light" data-toggle="dropdown"><p class="mb-1">...</p></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-posttextid="{{$allTextPost->id}}" data-edittext="{{$allTextPost->post_text}}" data-toggle="modal" data-target="#updateTextStatus">Edit</a>
                                <a class="dropdown-item" href="{{route('deleteTextStatus',['postTextId'=>$allTextPost->id])}}" onclick="return confirm('Are you sure, you want to delete the text status!!')">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p id="a">{{$allTextPost->post_text}}</p>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-xl-2"></div>
        @endforeach

    </div>
    <div class="row mt-2 mb-2">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 col-lg-8 col-md-8 d-flex justify-content-center">{{$allTextPosts->links()}}</div>
        <div class="col-xl-2"></div>
    </div >
@endsection
