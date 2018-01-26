
<!DOCTYPE html>
<html>
<head>
	<title>Thêm tài khoản mới</title>
	<meta charset="UTF-8">
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <script src="http//code.jquery.com/jquery.js"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form autocomplete="off" action="{{url('querry/insertAUser2')}}" method="post">
					<div class="form-group">
						<label>Tài khoản</label>
						@if($errors->has('taikhoan'))
							@foreach($errors->get('taikhoan') as $er)
								<p style="color:red">{{$er}}</p>
							@endforeach
						@endif
						<input type="text" class="form-control" name="taikhoan" value=""/>
					</div>
					<div class="form-group">
						<label>Mật khẩu</label>
						@if($errors->has('matkhau'))
							@foreach($errors->get('matkhau') as $er)
								<p style="color:red">{{$er}}</p>
							@endforeach
						@endif
						<input type="password" class="form-control" name="matkhau" value="" />
					</div>
						@if($errors->has('PhanHoi'))
							<div class="alert alert-danger">
								{{$errors->first('PhanHoi')}}
							</div>
						@endif

					<button type="submit" name="" class="btn btn-primary">Đăng ký</button>
					{!! csrf_field() !!}
				</form>
			</div>
		</div>
	</div>
</body>
</html>