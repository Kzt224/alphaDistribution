<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role)
    {
        
         if(!auth()->check()){
            return redirect('/login');
         }

         if(auth()->user()->role != $role){
            return redirect('/client/login');
         }
         
        return $next($request);

    }
}
