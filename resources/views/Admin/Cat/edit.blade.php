@extends('admin.master')
@section('title', 'Sửa danh mục '.$itemCat->cat_name)
@section('content')
	@if($errors->any())
		<div class="alert alert-danger">
			Lỗi:
			@foreach($errors->all() as $er)
				{{$er}}</br>
			@endforeach
			Bonus: {{$errors->first('test')}}
		</div>
	@endif
	Sửa {{$itemCat->cat_name}}
	<form action="{{url('admin/cat/edit/'.$itemCat->cat_id)}}" method="post" class="form">
		<div class="form-group">
			<label>Tên chuyên mục:</label>
			<input type="text" name="cat_name" value="{{$itemCat->cat_name}}" class="form-control">
		</div>
		<div class="form-group">
			<label>Mô tả:</label>
			<input type="text" name="cat_des" value="" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Ok</button>
		{{csrf_field()}}
	</form>
@endSection('content')