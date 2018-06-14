<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      //กำหนดการ redirect หลังจาก ตรวจสอบการ authen
        /*if (Auth::guard($guard)->check()) {
            return redirect('/homeTeacher');
        }*/
        if (Auth::guard($guard)->check() && auth()->user()->userType == 1)
        {
          return redirect('/home');
        }

        if (Auth::guard($guard)->check() && auth()->user()->userType == 0)
        {
          return redirect('/homeTeacher');
        }
        return $next($request);
    }
}
