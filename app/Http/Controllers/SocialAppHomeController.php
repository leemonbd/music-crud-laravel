<?php

namespace App\Http\Controllers;

use App\CoverImages;
use App\PostAlbum;
use App\PostAudio;
use App\PostImage;
use App\PostText;
use App\PostVideo;
use App\ProfileImages;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;


class SocialAppHomeController extends Controller
{

    public function allProfilePhotos(){
        $profileImagePost=ProfileImages::join('customers', 'profile_images.customer_id','customers.id')
            ->select('profile_images.*','customers.name')
            ->orderBy('id','DESC')
            ->paginate(6);
        return view('front-end.home.all-profile-photos',[
            'profileImagePost'=>$profileImagePost,
        ]);
    }


    public function allCoverPhotos(){
        $coverImagePost= CoverImages::join('customers', 'cover_images.customer_id','customers.id')
            ->select('cover_images.*','customers.name')
            ->orderBy('id','DESC')
            ->paginate(6);
        return view('front-end.home.all-cover-photos',[
            'coverImagePost'=>$coverImagePost,
        ]);
    }



    public function allTextPost(){

        $allTextPost= PostText::join('customers', 'post_texts.customer_id','customers.id')
            ->select('post_texts.*','customers.name')
            ->orderBy('id','DESC')
            ->paginate(12);
        return view('front-end.home.all-text-post',[
            'allTextPost'=>$allTextPost,
        ]);
    }

    public function allVideoPosts(){
        $allVideoPost= PostVideo::join('customers', 'post_videos.customer_id','customers.id')
            ->select('post_videos.*','customers.name')
            ->orderBy('id','DESC')
            ->paginate(6);

        return view('front-end.home.all-video-posts',[
            'allVideoPost'=>$allVideoPost,
        ]);
    }

    public function allAudioPosts(){
        $allAudioPost= PostAudio::join('customers', 'post_audio.customer_id','customers.id')
            ->select('post_audio.*','customers.name')
            ->orderBy('id','DESC')
            ->paginate(12);

        return view('front-end.home.all-audio-posts',[
            'allAudioPost'=>$allAudioPost,
        ]);
    }

    public function allPhotoPosts(){
        $allImagePost= PostImage::join('customers', 'post_images.customer_id','customers.id')
            ->select('post_images.*','customers.name')
            ->orderBy('id','DESC')
            ->paginate(6);

        return view('front-end.home.all-photo-posts',[
            'allImagePost'=>$allImagePost,
        ]);
    }


}
