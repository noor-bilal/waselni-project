<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next=null, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }else{
            return  redirect('admin');
        }
    }
}
