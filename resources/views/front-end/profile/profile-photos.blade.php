@extends('front-end.master-profile')

@section('title')
    All Albums Photos - Social App
@endsection

@section('profileBody')
    <div class="row text-center no-gutters mt-5">
        @foreach($profileImages as $profileImage)
            <div class="col-sm-6 col-md-4 col-lg-4 col-12 allAlbumPhotos">
                <a href="{{asset($profileImage->profile_image)}}">
                    <img src="{{asset($profileImage->profile_image)}}" alt="all-album-photos" class="img-fluid">
                </a>
                <form method="POST" action="{{route('deleteProfilePhoto')}}">
                    @csrf
                    <input type="hidden" name="profileImageId"  value="{{$profileImage->id}}">
                    <input type="submit" name="btn" class="btn btn-outline-dark btn-block btn-sm" value="Delete" onclick="return confirm('Are you sure, you want to delete this photo!!')">
                </form>
            </div>
        @endforeach

    </div>
@endsection
