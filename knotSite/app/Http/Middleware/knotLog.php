<?php

namespace App\Http\Middleware;

use Closure;

class knotLog
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
        if($request->input('username') == "admin"){
            return view('welcome');
        }
        return $next($request);
    }
}
