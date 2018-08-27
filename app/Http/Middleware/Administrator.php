<?php

namespace Absltcast\Http\Middleware;

use Closure;

class Administrator
{
   
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            
            if(auth()->user()->isAdmin()){
                return $next($request);        
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
