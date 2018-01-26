<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class HomeController extends Controller
{
    public function getView()
    {
    	return view('admin.home.view');
    }

    public function getLogout()
    {
    	Session::flush();
    	return redirect()->intended('login');
    }
}
