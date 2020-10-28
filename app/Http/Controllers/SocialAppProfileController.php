<?php

namespace App\Http\Controllers;

use App\PostAlbum;
use App\PostAudio;
use App\PostImage;
use App\PostText;
use App\PostVideo;
use \Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\CoverImages;
use App\Customer;
use App\ProfileImages;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Session;
use Image;

class SocialAppProfileController extends Controller
{
    public function profile(){
        $customerSessionId=Session::get('customerId');
        $albumTitleName=Session::get('albumTitleName');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $textPost=PostText::all()->where('customer_id',$customerSessionId)->last();
        $audioPost=PostAudio::all()->where('customer_id',$customerSessionId)->last();
        $audioPostFour=PostAudio::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->take(4)->get();
        $videoPost=PostVideo::all()->where('customer_id',$customerSessionId)->last();
        $videoPostFour=PostVideo::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->take(4)->get();
        $imagePost=PostImage::all()->where('customer_id',$customerSessionId)->last();
        $albumPost=PostAlbum::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->take(4)->get();
        $albumPostLast=PostAlbum::all()->where('customer_id',$customerSessionId)->last();
        $albumPostTwelve=PostAlbum::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->take(12)->get();


        return view('front-end.profile.profile',[
            'coverimage'=>$coverimage,
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'profileImage'=>$profileImage,
            'textPost'=>$textPost,
            'audioPost'=>$audioPost,
            'audioPostFour'=>$audioPostFour,
            'videoPost'=>$videoPost,
            'videoPostFour'=>$videoPostFour,
            'imagePost'=>$imagePost,
            'albumPost'=>$albumPost,
            'albumPostLast'=>$albumPostLast,
            'albumPostTwelve'=>$albumPostTwelve,
        ]);
    }



    public function changeCoverImage(Request $request){
        $coverImage=$request->file('cover_image');
        $coverImageName=hexdec(uniqid()).$coverImage->getClientOriginalName();
        /*$fileType=$bookImage->getClientOriginalExtension();
        $bookImageName=$request->bookName.'.'.$fileType;*/
        $imageDirectory='front-end/images/coverImage/';
        $imageURL=$imageDirectory.$coverImageName;
        $coverImage->move($imageDirectory,$coverImageName);
        //Image::make($coverImage)->save($imageURL);
        //return $imageURL;

        $coverimage=new CoverImages();
        $coverimage->customer_id =$request->customer_id;
        $coverimage->cover_image =$imageURL;
        $coverimage->save();


        return redirect('/profile');
    }




    public function changeProfileImage(Request $request){
        $profileImage=$request->file('profile_image');
        $profileImageName=hexdec(uniqid()).$profileImage->getClientOriginalName();
        /*$fileType=$bookImage->getClientOriginalExtension();
        $bookImageName=$request->bookName.'.'.$fileType;*/
        $imageDirectory='front-end/images/profileImage/';
        $imageURL=$imageDirectory.$profileImageName;
        //$bookImage->move($imageDirectory,$bookImageName);
        Image::make($profileImage)->resize(704,667)->save($imageURL);
        //return $imageURL;

        $profileimage=new ProfileImages();
        $profileimage->customer_id =$request->customer_id;
        $profileimage->profile_image =$imageURL;
        $profileimage->save();


        return redirect('/profile');
    }

    public function postText(Request $request){

        $postText=new PostText();
        $postText->customer_id =$request->customer_id;
        $postText->post_text =$request->post_text;;
        $postText->save();

        return redirect('/profile');


    }



    public function postImage(Request $request){
        $singleImageFile=$request->file('post_image');
        $singleImageName=hexdec(uniqid()).$singleImageFile->getClientOriginalName();
        $singleImageDirectory='front-end/images/singleImage/';
        $singleImageURL=$singleImageDirectory.$singleImageName;
        $singleImageFile->move($singleImageDirectory,$singleImageName);
        //Image::make($singleImageFile)->save($singleImageURL);


        $postImage=new PostImage();
        $postImage->customer_id =$request->customer_id;
        $postImage->image_title =$request->image_title;
        $postImage->post_image =$singleImageURL;
        $postImage->save();

        return redirect('/profile');
    }

     public function postAlbum(Request $request){
            $albumImages=$request->file('post_image_album');


          foreach ($albumImages as $albumImage){
                $albumImageName=hexdec(uniqid()).$albumImage->getClientOriginalName();
                $albumImageDirectory='front-end/images/albumImges/';
                $albumImageURL=$albumImageDirectory.$albumImageName;
                $albumImage->move($albumImageDirectory,$albumImageName);
                //Image::make($albumImage)->save($albumImageURL);
                //$albumImage->move($albumImageDirectory,$albumImageName);


                $postAlbum=new PostAlbum();
                $postAlbum->customer_id =$request->customer_id;
                $postAlbum->album_title =$request->album_title;
                $postAlbum->post_image_album =$albumImageURL;
                $postAlbum->save();

              Session::put('albumTitleName',$postAlbum->album_title);
            }

            return redirect('/profile');
        }


    public function postAudio(Request $request){
        $audioFile=$request->file('post_audio');
        $audioFileName=hexdec(uniqid()).$audioFile->getClientOriginalName();
        $audioDirectory='front-end/audios/';
        $audioURL=$audioDirectory.$audioFileName;
        $audioFile->move($audioDirectory,$audioFileName);
        //return $imageURL;

        $postAudio=new PostAudio();
        $postAudio->customer_id =$request->customer_id;
        $postAudio->audio_title =$request->audio_title;
        $postAudio->audio_artist =$request->audio_artist;
        $postAudio->post_audio =$audioURL;
        $postAudio->save();

        return redirect('/profile');
    }

    public function postVideo(Request $request){
        $videoFile=$request->file('post_video');
        $videoFileName=hexdec(uniqid()).$videoFile->getClientOriginalName();
        $videoDirectory='front-end/videos/';
        $videoURL=$videoDirectory.$videoFileName;
        $videoFile->move($videoDirectory,$videoFileName);

        $bgImage=$request->file('bg_image');
        $bgImageName=hexdec(uniqid()).$bgImage->getClientOriginalName();
        $bgImageDirectory='front-end/videos/bgimage/';
        $bgiImageURL=$bgImageDirectory.$bgImageName;
        $bgImage->move($bgImageDirectory,$bgImageName);
        //Image::make($bgImage)->save($bgiImageURL);


        $postVideo=new PostVideo();
        $postVideo->customer_id =$request->customer_id;
        $postVideo->video_title =$request->video_title;
        $postVideo->bg_image =$bgiImageURL;
        $postVideo->post_video =$videoURL;
        $postVideo->save();

        return redirect('/profile');

    }

    public function myVideos(){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $videoPost=PostVideo::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->get();

        return view('front-end.profile.my-videos',[
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,
            'videoPost'=>$videoPost,
        ]);
    }

    public function deleteVideo(Request $request){
        $deleteVideoById=PostVideo::find($request->postVideoId);
        if($deleteVideoById->post_video){
            if(file_exists($deleteVideoById->post_video)){
                unlink($deleteVideoById->post_video);
                unlink($deleteVideoById->bg_image);
            }
        }
        $deleteVideoById->delete();
        return redirect()->back();
    }

    public function myAudios(){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $audioPost=PostAudio::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->get();

        return view('front-end.profile.my-audios',[
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,
            'audioPost'=>$audioPost,
        ]);
    }

    public function deleteAudio(Request $request){
        $deleteAudioById=PostAudio::find($request->postAudioId);
        if($deleteAudioById->post_audio){
            if(file_exists($deleteAudioById->post_audio)){
                unlink($deleteAudioById->post_audio);
            }
        }
        $deleteAudioById->delete();
        return redirect()->back();
    }

    public function myPhotos(){
            $customerSessionId=Session::get('customerId');
            $customer=Customer::find(Session::get('customerId'));
            $customerAddress=DB::table('customers')
                ->join('divisions', 'customers.division','=','divisions.id')
                ->join('districts', 'customers.district','=','districts.id')
                ->select('customers.*','divisions.division_name','districts.district_name')
                ->where('customers.id',$customerSessionId)
                ->first();
            $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
            $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
            $imagePost=PostImage::all()->where('customer_id',$customerSessionId)->last();
            $albumPost=PostAlbum::all()->where('customer_id',$customerSessionId)->last();

            return view('front-end.profile.my-photos',[
                'customer'=>$customer,
                'customerAddress'=>$customerAddress,
                'coverimage'=>$coverimage,
                'profileImage'=>$profileImage,
                'imagePost'=>$imagePost,
                'albumPost'=>$albumPost,
            ]);
        }

    public function myTextStatus(){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $allTextPosts=PostText::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->paginate(6);
        return view('front-end.profile.my-text-status',[
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,
            'allTextPosts'=>$allTextPosts,

        ]);
    }

    public function updateTextStatus(Request $request){
        $updateTextStatus=PostText::findOrFail($request->postTextId);
        $updateTextStatus->post_text =$request->edit_text;
        $updateTextStatus->save();

        return redirect()->back();
    }
    public function deleteTextStatus($postTextId){
        $deleteTextStatus=PostText::findOrFail($postTextId);
        $deleteTextStatus->delete();

        return redirect()->back();
    }

    public function allAlbumsPhotos(){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $albumPost=PostAlbum::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->get();

        return view('front-end.profile.all-albums-photos',[
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,
            'albumPost'=>$albumPost,
        ]);
    }

    public function deleteAlbumImage(Request $request){
        $deleteAlbumImageById=PostAlbum::find($request->postAlbumId);
        if($deleteAlbumImageById->post_image_album){
            if(file_exists($deleteAlbumImageById->post_image_album)){
                unlink($deleteAlbumImageById->post_image_album);
            }
        }
        $deleteAlbumImageById->delete();
        return redirect()->back();
    }

    public function allPhotos(){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $allPhotos=PostImage::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->get();

        return view('front-end.profile.all-photos',[
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,
            'allPhotos'=>$allPhotos,
        ]);
    }

    public function deleteSinglePhoto(Request $request){
        $deleteSingleImageById=PostImage::find($request->postImageId);
        if($deleteSingleImageById->post_image){
            if(file_exists($deleteSingleImageById->post_image)){
                unlink($deleteSingleImageById->post_image);
            }
        }
        $deleteSingleImageById->delete();
        return redirect()->back();
    }

    public function coverPhotos(){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $coverImages=CoverImages::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->get();

        return view('front-end.profile.cover-photos',[
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,
            'coverImages'=>$coverImages,
        ]);
    }
    public function deleteCoverPhoto(Request $request){
        $deleteCoverImageById=CoverImages::find($request->coverImageId);
        if($deleteCoverImageById->cover_image){
            if(file_exists($deleteCoverImageById->cover_image)){
                unlink($deleteCoverImageById->cover_image);
            }
        }
        $deleteCoverImageById->delete();
        return redirect()->back();
    }

    public function profilePhotos(){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find(Session::get('customerId'));
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImages=ProfileImages::orderBy('id', 'DESC')->where('customer_id',$customerSessionId)->get();

        return view('front-end.profile.profile-photos',[
            'customer'=>$customer,
            'customerAddress'=>$customerAddress,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,
            'profileImages'=>$profileImages,
        ]);
    }

    public function deleteProfilePhoto(Request $request){
        $deleteProfileImageById=ProfileImages::find($request->profileImageId);
        if($deleteProfileImageById->profile_image){
            if(file_exists($deleteProfileImageById->profile_image)){
                unlink($deleteProfileImageById->profile_image);
            }
        }
        $deleteProfileImageById->delete();
        return redirect()->back();
    }




}
