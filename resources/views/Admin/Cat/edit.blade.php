@extends('admin.master')
@section('title', 'Sửa danh mục '.$itemCat->cat_name)
@section('content')
	@if(count($errors)>0)
		<div class="alert alert-danger">
			Lỗi: 
			{{$errors->first()}}

			@foreach($errors as $er)
			{{$er}}
			@endforeach
		</div>
	@endif
	Sửa {{$itemCat->cat_name}}
	<form action="{{url('admin/cat/edit/'.$itemCat->cat_id)}}" method="post" class="form">
		<input type="text" name="cat_name" value="{{$itemCat->cat_name}}" class="form-control">
		<button type="submit" class="btn btn-primary">Ok</button>
		{{csrf_field()}}
	</form>
@endSection('content')