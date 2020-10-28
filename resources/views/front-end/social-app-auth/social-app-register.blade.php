<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Social App Register</title>
    <link rel="icon" type="image/png" href="{{asset('/')}}front-end/images/favicon.png">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/bootstrap.css"/>
</head>
<body class="light ">
    <div class="wrapper vh-100">
            <div class="row align-items-center h-100">
                <form class="col-xl-4 col-lg-6 col-md-8 col-sm-10 col-10 mx-auto" method="POST" action="{{route('newCustomer') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mx-auto text-center my-4">
                        <a class="navbar-brand mx-auto flex-fill text-center" href="{{route('socialAppLogin')}}">
                            <img src="{{asset('/')}}front-end/images/logo.png" alt="logo" class="img-fluid" style="width: 50%">
                        </a>

                        <h2 class="my-1">Register</h2>
                        <h3 class="text-success">{{Session::get('message')}}</h3>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="firstname">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword5">New Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                        <span class="text-danger">{{ $errors->has('confirmPassword') ? $errors->first('confirmPassword') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Address</label>
                        <div>
                            <select name="division" id="division">
                                <option>Select Division</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->division_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->has('division') ? $errors->first('division') : ''}}</span>

                            <select name="district" id="district">
                                <option>Select District</option>
                            </select>
                            <span class="text-danger">{{ $errors->has('district') ? $errors->first('district') : ''}}</span>

                            <select>
                                <option>Bangladesh</option>
                            </select>
                        </div>

                    </div>
                    <div class="checkbox">
                        <p>Already have account? <a href="{{route('socialAppLogin')}}">Click</a> here</p>
                    </div>
                   <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn">Sign up</button>
                    <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
                </form>
            </div>
    </div>
    <script src="{{asset('/')}}front-end/js/jquery-3.4.1.js"></script>
    <script src="{{asset('/')}}front-end/js/popper.js"></script>
    <script src="{{asset('/')}}front-end/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="division"]').on('change',function (){
                var division=$(this).val();
                if(division){
                    $.ajax({
                        url:"{{url('/get/subcat/')}}/"+division,
                        type:"GET",
                        dataType:"json",
                        success:function (data){
                            $("#district").empty();
                            $.each(data, function (key, value) {
                                $("#district").append('<option value="' + value.id + '">' + value.district_name + '</option>');
                            });
                        }
                    })
                }else {
                    alert('danger');
                }
            })

        })
    </script>
</body>
</html>
