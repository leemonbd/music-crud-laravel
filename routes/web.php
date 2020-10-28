<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[
    'uses'=>'SocialAppAuthController@index',
    'as'=> 'socialAppLogin'
]);

Route::get('/social-app-register',[
    'uses'=>'SocialAppAuthController@socialAppRegister',
    'as'=> 'socialAppRegister'
]);

Route::get('/my-account/{customerId}',[
    'uses'=>'SocialAppAuthController@myAccount',
    'as'=> 'myAccount'
]);

Route::post('/update-account',[
    'uses'=>'SocialAppAuthController@updateAccount',
    'as'=> 'updateAccount'
]);

Route::get('/social-app-forget-pass',[
    'uses'=>'SocialAppAuthController@socialAppForgetPass',
    'as'=> 'socialAppForgetPass'
]);

Route::get('/social-app-register',[
    'uses'=>'SocialAppAuthController@socialAppDivisionsDistricts',
    'as'=> 'socialAppRegister'
]);

Route::post('/new-customer',[
    'uses'=>'SocialAppAuthController@newCustomer',
    'as'=> 'newCustomer'
]);

Route::post('/new-login',[
    'uses'=>'SocialAppAuthController@newLogin',
    'as'=> 'newLogin'
]);


Route::get('/customer-logout',[
    'uses'=>'SocialAppAuthController@customerLogout',
    'as'=> 'customerLogout'
]);

Route::get('/get/subcat/{id}',[
    'uses'=>'SocialAppAuthController@getSubcat',
]);

Route::get('/get/district/{id}',[
    'uses'=>'SocialAppAuthController@getDistrict',
]);

Route::get('/profile',[
    'uses'=>'SocialAppProfileController@profile',
    'as'=> 'profile'
]);


Route::post('/change-cover-image',[
    'uses'=>'SocialAppProfileController@changeCoverImage',
    'as'=> 'changeCoverImage'
]);

Route::post('/change-profile-image',[
    'uses'=>'SocialAppProfileController@changeProfileImage',
    'as'=> 'changeProfileImage'
]);

Route::post('/post-text',[
    'uses'=>'SocialAppProfileController@postText',
    'as'=> 'postText'
]);

Route::post('/post-audio',[
    'uses'=>'SocialAppProfileController@postAudio',
    'as'=> 'postAudio'
]);

Route::post('/post-video',[
    'uses'=>'SocialAppProfileController@postVideo',
    'as'=> 'postVideo'
]);

Route::post('/post-image',[
    'uses'=>'SocialAppProfileController@postImage',
    'as'=> 'postImage'
]);

Route::post('/post-album',[
    'uses'=>'SocialAppProfileController@postAlbum',
    'as'=> 'postAlbum'
]);

Route::get('/my-videos',[
    'uses'=>'SocialAppProfileController@myVideos',
    'as'=> 'myVideos'
]);

Route::post('/delete-video',[
    'uses'=>'SocialAppProfileController@deleteVideo',
    'as'=> 'deleteVideo'
]);

Route::get('/my-audios',[
    'uses'=>'SocialAppProfileController@myAudios',
    'as'=> 'myAudios'
]);

Route::post('/delete-audio',[
    'uses'=>'SocialAppProfileController@deleteAudio',
    'as'=> 'deleteAudio'
]);

Route::get('/my-photos',[
    'uses'=>'SocialAppProfileController@myPhotos',
    'as'=> 'myPhotos'
]);

Route::get('/my-text-status',[
    'uses'=>'SocialAppProfileController@myTextStatus',
    'as'=> 'myTextStatus'
]);

Route::post('/update-text-status',[
    'uses'=>'SocialAppProfileController@updateTextStatus',
    'as'=> 'updateTextStatus'
]);

Route::get('/delete-text-status/{postTextId}',[
    'uses'=>'SocialAppProfileController@deleteTextStatus',
    'as'=> 'deleteTextStatus'
]);

Route::get('/all-albums-photos',[
    'uses'=>'SocialAppProfileController@allAlbumsPhotos',
    'as'=> 'allAlbumsPhotos'
]);

Route::post('/delete-albums-image',[
    'uses'=>'SocialAppProfileController@deleteAlbumImage',
    'as'=> 'deleteAlbumImage'
]);

Route::get('/all-photos',[
    'uses'=>'SocialAppProfileController@allPhotos',
    'as'=> 'allPhotos'
]);

Route::post('/delete-singe-photo',[
    'uses'=>'SocialAppProfileController@deleteSinglePhoto',
    'as'=> 'deleteSinglePhoto'
]);

Route::get('/cover-photos',[
    'uses'=>'SocialAppProfileController@coverPhotos',
    'as'=> 'coverPhotos'
]);

Route::post('/delete-cover-photo',[
    'uses'=>'SocialAppProfileController@deleteCoverPhoto',
    'as'=> 'deleteCoverPhoto'
]);

Route::get('/profile-photos',[
    'uses'=>'SocialAppProfileController@profilePhotos',
    'as'=> 'profilePhotos'
]);

Route::post('/delete-profile-photo',[
    'uses'=>'SocialAppProfileController@deleteProfilePhoto',
    'as'=> 'deleteProfilePhoto'
]);

Route::get('/home',[
    'uses'=>'SocialAppHomeController@home',
    'as'=> 'home'
]);

Route::get('/all-profile-photos',[
    'uses'=>'SocialAppHomeController@allProfilePhotos',
    'as'=> 'allProfilePhotos'
]);



Route::get('/all-cover-photos',[
    'uses'=>'SocialAppHomeController@allCoverPhotos',
    'as'=> 'allCoverPhotos'
]);



Route::get('/all-text-post',[
    'uses'=>'SocialAppHomeController@allTextPost',
    'as'=> 'allTextPost'
]);
Route::get('/all-video-posts',[
    'uses'=>'SocialAppHomeController@allVideoPosts',
    'as'=> 'allVideoPosts'
]);

Route::get('/all-audio-posts',[
    'uses'=>'SocialAppHomeController@allAudioPosts',
    'as'=> 'allAudioPosts'
]);

Route::get('/all-photo-posts',[
    'uses'=>'SocialAppHomeController@allPhotoPosts',
    'as'=> 'allPhotoPosts'
]);





Auth::routes();
Route::get('/login', 'HomeController@index')->name('login');
