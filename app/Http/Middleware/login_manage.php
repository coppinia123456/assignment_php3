<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class login_manage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $Cookie_user = Cookie::get('admin_login_remember');
        $session_user = Auth::check();
        
        if (isset($Cookie_user) && !empty($Cookie_user)) { // check isset cookie
            $check_user = DB::table("users")->where('remember_token', $Cookie_user)->get();
            if (!isset($Cookie_user) || empty($Cookie_user)) {

                return redirect('/auth/login');
            }
        }
        else if ($session_user === false) { // check isset session
            return redirect('/auth/login');
        }


        return $next($request);
    }
}
