<?php

namespace App\Http\Middleware;

use Closure;

class sesi
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
       if(session('nama') != null){
           return $next($request);
       }else{
           return abort("404");
       }
    }
}
