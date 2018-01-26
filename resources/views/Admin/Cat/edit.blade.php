@extends('admin.master')
@section('title', 'Sửa danh mục '.$itemCat->cat_name)
@section('content')
	@if($errors->has('error'))
		<div class="alert alert-danger">
			{{$error}}
		</div>
	@endif
	Sửa {{$itemCat->cat_name}}
	<form action="{{url('admin/cat/edit/'.$itemCat->cat_id)}}" method="post">
		<input type="text" name="cat_name" value="{{$itemCat->cat_name}}">
		<button type="submit" class="btn btn-primary">Ok</button>
	</form>
@endSection('content')