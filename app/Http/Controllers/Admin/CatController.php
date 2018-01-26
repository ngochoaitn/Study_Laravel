<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Session;

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
    	$rules=[
    		'cat_name'=>'required|min:2',
    		'cat_des'=>'min:10'
    	];
    	$messages=[
    		'cat_name.required'=>'Tên danh mục là bắt buộc',
    		'cat_name.min'=>'Tối thiểu 2 ký tự',
    		'cat_des.min'=>'Mô tả tối thiếu 10 ký tự'
    	];

    	$catName=$request->cat_name;
    	$validator=Validator::make($request->all(), $rules, $messages);
    	if($validator->fails())
    	{
    		$data['itemCat'] = DB::table('category')->where('cat_id', $id)->first();
    		//$errors = $validator;
    		$errors['test']="Lỗi bonus";
    		return redirect()->back()->withErrors($validator)->with($data);
    		//return view('admin.cat.edit', $errors, isset($data) ? $data : NULL);
    	}
    	else
    	{
    		$arr=[
    			'cat_name'=>$catName
    		];
    		DB::table('category')->where('cat_id', $id)->update($arr);
    		Session::flash('success', 'Cập nhật danh mục thành công');
    		$data['listCat'] = DB::table('category')->get();
    		return redirect('admin/cat')->with($data);
    	}
    }

    public function getDel($id)
    {
    	DB::table('category')->where('cat_id', $id)->delete();
    	Session::flash('success', 'Xóa thành công');
    	$data['listCat'] = DB::table('category')->get();
    	return redirect('admin/cat')->with($data);//Khi refresh sẽ không hỏi như return view
    }
}
