<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //response for admin dashboard
        if (Auth::check()&& Auth::user()->isAdmin() ){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }

    }
}
