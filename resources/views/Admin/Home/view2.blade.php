<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <script src="http//code.jquery.com/jquery.js"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        Trang chủ
        @if(Session::has('login'))
            Chào mừng {{Session::get('login')->demo_user}}</br></div>
            <a href="logout">Đăng xuất</a>
        @endif
    </div>
</body>
</html>