<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('login'))
        {
            $arr = [
                'demo_user' => Session::get('login')->demo_user,
                'demo_pass' => Session::get('login')->demo_pass,
            ];
            if(DB::table('demo')->where($arr)->count() == 1)
            {
                return redirect()->intended('admin/home/view');
            }
            else
            {
                return $next($request);
            }
        }
        else
        {
            return $next($request);
        }
    }
}
