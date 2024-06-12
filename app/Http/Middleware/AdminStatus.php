<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminStatus
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
        if (Admin::where('user_id' , Auth::user()->id)->exists()) {
           if (Admin::where('user_id' , Auth::user()->id)->first()->status == 1) {
                return $next($request);
            }
            else{
                return redirect(route('no_permission'));
            }
        }
        else{
            if (Auth::user()->role == 3) {
               return $next($request);
            }
            if (Auth::user()->role == 4) {
               return $next($request);
            }
            return redirect(route('check_status'));
        }


    }
}
