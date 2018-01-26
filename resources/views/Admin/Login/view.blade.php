<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <script src="http//code.jquery.com/jquery.js"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{url('login')}}" method="POST" role="form">
                    <legend>Login</legend>
                    @if($errors->has('errorlogin'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{$errors->first('errorlogin')}}
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="">Tài khoản</label>
                        <input type="text" class="form-control" id="user" placeholder="user" name="demo_user" value="{{old('user')}}">
                        @if($errors->has('user'))
                            <p style="color:red">{{$errors->first('user')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="pass" placeholder="pass" name="demo_pass">
                        @if($errors->has('pass'))
                            <p style="color:red">{{$errors->first('pass')}}</p>
                        @endif
                    </div>
                
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>