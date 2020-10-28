<div class="modal fade" id="changeProfileImage">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('changeProfileImage')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="color: #001489">Choose a profile image</label>
                            <input type="file" name="profile_image" accept="image/" class="btn btn-block " style="background-color: #001489; color:#F0F0F0">
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="profile-image-change-btn" class="btn btn-block " value="Change" style="background-color: #001489; color:#F0F0F0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" style="color:#001489">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changeCoverImage">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('changeCoverImage')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="color: #001489">Choose a cover image</label>
                            <input type="file" name="cover_image" accept="image/" class="btn btn-block " style="background-color: #001489; color:#F0F0F0">
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="cover-image-change-btn" class="btn btn-block " value="Change" style="background-color: #001489; color:#F0F0F0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" style="color:#001489">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="postText">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #001489">Post Text or Image</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('postText')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea placeholder="Whats on your mind?" class="form-control" name="post_text"></textarea>
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="text-post-btn" class="btn btn-block " value="Post" style="background-color: #001489; color:#F0F0F0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" style="color:#001489">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateTextStatus">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Update Text</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('updateTextStatus')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="edit_text" id="editText"> </textarea>
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                            <input type="hidden" name="postTextId" id="posttextid" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update-post-btn" class="btn btn-block btn-dark" value="Update Post">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="postImage">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #001489">Post Image</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('postImage')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="color: #001489">Image Title</label>
                            <input type="text" name="image_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label style="color: #001489">Choose an image file</label>
                            <input type="file" name="post_image" accept="image/*" class="btn btn-block " style="background-color: #001489; color:#F0F0F0">
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="image-post-btn" class="btn btn-block " value="Post" style="background-color: #001489; color:#F0F0F0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" style="color:#001489">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="photoAlbum">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #001489">Post Image</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('postAlbum')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="album_title" placeholder="Album Name">
                        </div>
                        <div class="form-group">
                            <label style="color: #001489">Choose multiple image file</label>
                            <input type="file" multiple name="post_image_album[]" accept="image/*" class="btn btn-block " style="background-color: #001489; color:#F0F0F0">
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="image-album-post-btn" class="btn btn-block " value="Post" style="background-color: #001489; color:#F0F0F0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" style="color:#001489">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="postVideo">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 style="color: #001489">Post Video</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('postVideo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="color: #001489">Video Title</label>
                            <input type="text" name="video_title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label style="color: #001489">Choose a video file</label>
                            <input type="file" multiple name="post_video" accept="video/*" class="btn btn-block " style="background-color: #001489; color:#F0F0F0">
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                        </div>

                        <div class="form-group">
                            <label style="color: #001489">Choose a background image</label>
                            <input type="file" name="bg_image" accept="image/*" class="btn btn-block " style="background-color: #001489; color:#F0F0F0">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="video-post-btn" class="btn btn-block " value="Post" style="background-color: #001489; color:#F0F0F0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" style="color:#001489">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="postAudio">
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #001489">Post Audio</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('postAudio')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="color: #001489">Song Title</label>
                            <input type="text" name="audio_title" class="form-control" >

                        </div>

                        <div class="form-group">
                            <label style="color: #001489">Artist Name</label>
                            <input type="text" name="audio_artist" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label style="color: #001489">Choose an audio file </label>
                            <input type="file" multiple name="post_audio" accept="audio/*" class="btn btn-block " style="background-color: #001489; color:#F0F0F0">
                            <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="audio-post-btn" class="btn btn-block " value="Post" style="background-color: #001489; color:#F0F0F0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" style="color:#001489">Close</button>

                </div>

            </div>
        </div>
    </div>
</div>
