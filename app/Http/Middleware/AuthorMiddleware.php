<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorMiddleware
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
        //response for author dashboard
        if (Auth::check() && Auth::user()->isAuthor() ){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}
