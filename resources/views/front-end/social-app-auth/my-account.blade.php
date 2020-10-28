@extends('front-end.master-profile')

@section('title')
    My Videos - Social App
@endsection

@section('profileBody')
    <div class="row mt-5">
        <form class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12 mx-auto mt-5 border" method="POST" action="{{route('updateAccount')}}" enctype="multipart/form-data">
            @csrf
            <br>
                <div class="form-group">
                    <label for="firstname" >Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$customer->name}}">
                    <input type="hidden" id="id" name="id" class="form-control" value="{{$customer->id}}">
                </div>

            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$customer->email}}">
            </div>

            <div class="form-group">
                <label for="inputPassword5">Old Password</label>
                <input type="password" class="form-control" name="old_password" id="password">
                <span class="text-danger">{{Session::get('message')}}</span>
            </div>
            <div class="form-group">
                <label for="inputPassword5">New Password</label>
                <input type="password" class="form-control" name="new_password" id="password" value="{{$customer->password}}">
            </div>

            <div class="form-group">
                <label for="inputPassword5">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="password" value="{{$customer->confirm_password}}">
                <span class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : ''}}</span>
            </div>


            <div class="form-group">
                {{--<div>
                   <select name="division" id="division">
                        <option>Select Division</option>
                      @foreach($divisions as $division)
                            <option value="{{$division->id}}">{{$division->division_name}}</option>
                        @endforeach-
                    </select>
                    <span class="text-danger">{{ $errors->has('division') ? $errors->first('division') : ''}}</span>

                    <select name="district" id="district">
                        <option>Select District</option>
                    </select>
                    <span class="text-danger">{{ $errors->has('district') ? $errors->first('district') : ''}}</span>

                    <select>
                        <option>Bangladesh</option>
                    </select>
                </div>--}}
            </div>
            @if($customerAddress)
                <div class="form-group">
                    <label>Division</label>
                    <input name="division" class="form-control" value="{{$customerAddress->division_name}}">
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input  name="district" class="form-control" value="{{$customerAddress->district_name}}" >
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input  name="country" class="form-control" value="{{$customer->country}}" >
                </div>

            @else
                <div class="form-group">
                    <label>Division</label>
                    <input name="division" class="form-control" value="{{$customer->division}}">
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input  name="district" class="form-control" value="{{$customer->district}}" >
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input  name="country" class="form-control" value="{{$customer->country}}" >
                </div>
            @endif
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn">Update Account Info</button>
            <br>
        </form>


    </div>
    <br>

@endsection



