<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Tekshiruvchi
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
        if (Auth::user()->role >= 2 || Auth::user()->role == 1 ) {
            return $next($request);
        }
        else{
            if (Auth::user()->email_status == 0) {
               return view('user.pages.phone.check_code');
            }
            return redirect('/home');
        }
    }
}
