@extends('admin.master')
@section('title', 'Trang chủ 1')
@section('content')
    Trang chủ
    @if(Session::has('login'))
        Chào mừng {{Session::get('login')->demo_user}}</br>
        <a href="logout">Đăng xuất</a>
    @endif
@endsection('content')