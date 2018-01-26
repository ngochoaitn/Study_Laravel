@extends('admin.master')
@section('title', 'Quản lý danh mục')
@section('content')
	@if(Session::has('success'))
		{{Session::get('success')}}
	@endif
	@foreach($listCat as $cat)
		<tr>
			<td>{{$cat->cat_id}}</td>
			<td>{{$cat->cat_name}}</td>
			<td><a class="btn btn-warining" href="{{asset('admin/cat/edit/'.$cat->cat_id)}}">Edit</a></td>
			<td><a class="btn btn-danger" href="{{asset('admin/cat/del/'.$cat->cat_id)}}">Delete</a></td>	
		</tr>
	@endforeach
@endsection('content')