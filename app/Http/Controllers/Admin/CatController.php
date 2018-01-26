<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;

class CatController extends Controller
{
    public function getView()
    {
    	$data['listCat'] = DB::table('category')->get();
    	return view('admin.cat.view', isset($data) ? $data : NULL);
    }

    public function getEdit($id)
    {
    	$data['itemCat'] = DB::table('category')->where('cat_id', $id)->first();
    	return view('admin.cat.edit', isset($data) ? $data : NULL);
    }

    public function postEdit(Request $request, $id)
    {
    	//return "Đã sửa";
    	$rules=[
    		'cat_name'=>'required'
    	];
    	$messages=[
    		'cat_name.required'=>'Tên danh mục là bắt buộc'
    	];

    	$catName=$request->cat_name;
    	$validator=Validator::make($request->all(), $rules, $messages);
    	if($validator->fails())
    	{
    		//$errors['error']=redirect()->back()->withErrors($validator);
    		//return view("admin/cat/edit/$id", $errors);
    		return "Lỗi";
    	}
    	else
    	{
    		$arr=[
    			'cat_name'=>$cat_name
    		];
    		DB::table('category')->where('cat_id', $id)->update($arr);
    		Session::flash('success', 'Cập nhật danh mục thành công');
    		return redirect()->back();
    	}
    }

    public function getDel($id)
    {
    	DB:table('category')->where('cat_id', $id)->delete();
    	Sesssion::flash('success', 'Xóa thành công');
    	return redirect()->intended('admin.cat.view');
    }
}
