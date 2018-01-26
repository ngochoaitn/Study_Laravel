<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Session;

class LoginController extends Controller
{
    //
    public function getLogin()
	{
		return view('Admin.Login.view');
	}

	public function postLogin(Request $request)
	{
		//echo "post OK 23";
		$rules=[
			'demo_user' => 'required',
			'demo_pass' => 'required'
		];
		$messages =[
			'demo_user.required'=>'Tài khoản không được để trống',
			'demo_pass.required' => 'Mật khẩu không được để trống'
		];

		$Validator=Validator::make($request->all(), $rules, $messages);
		if($Validator->fails())
		{
			$errors['error'] = redirect()->back()->withErrors($Validator);
			return view('admin.login.view', $errors);
		}
		else
		{
			$user = $request->demo_user;
			$passwor = $request->demo_pass;
			$data = DB::table('demo')->where([
				['demo_user', $user],
				['demo_pass', $passwor]])->first();
			if(!is_null($data))
			{
				Session::flash('success', 'Đăng nhập thành công');
				Session::put('login', $data);
				return redirect()->intended('admin/home/view');
			}
			else
			{
				Session::flash('error', 'Form session: Đăng nhập thật bại');
				$errors['errorlogin'] = 'Sai tài khoản hoặc mật khẩu';
				return redirect()->back()->withErrors($errors);
			}
		}
		
	}
}
