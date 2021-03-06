<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleWare
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
        $role= $request->session()->get('role');
        if($role=="Admin"){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
