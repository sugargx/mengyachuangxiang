<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginCheck
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
        if(session('rank')==2)
            return $next($request);
        return redirect()->route("login");
    }
}
