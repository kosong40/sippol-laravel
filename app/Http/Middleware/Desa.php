<?php

namespace App\Http\Middleware;

use Closure;

class Desa
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
        if(session('level') == 2){
            return $next($request);
        }else{
            return abort("404");
        }
    }
}
