<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
class AddUserController extends Controller
{
    public function getViewAddUser()
    {
    	return view('Admin.AddUserView');
    }

    public function postAUser(Request $request)
    {
    	$rules=[
    		'taikhoan' => 'required',
    		'matkhau' => 'required|min:8'
    	];

    	$messages=[
    		'taikhoan.required' => 'Tài khoản không thể để trống',
    		'matkhau.required' => 'Mật khẩu không thể để trống',
    		'matkhau.min' => 'Mật khẩu tối thiểu 8 ký tự',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator);
    	}
    	else
    	{
	    	$taiKhoan = $request->taikhoan;
	    	$matKhau = $request->matkhau;

	    	$count=DB::table('demo')->where(['demo_user'=>$taiKhoan])->count();

	    	if($count == 0)
	    	{
		    	DB::table('demo')->insert(
		    		['demo_user'=>$taiKhoan,
		    		 'demo_pass' => $matKhau]);
		    	return redirect()->intended('login');
		    	//return "Đã thêm tài khoản $taiKhoan";
	    	}
	    	else
	    	{
	    		$errors['PhanHoi']="Tài khoản $taiKhoan đã tồn tại";
	    		return redirect()->back()->withErrors($errors);
	    	}
    	}
    }
}
