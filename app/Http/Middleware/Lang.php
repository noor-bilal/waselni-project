<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Lang
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('lang')) {
            app()->setLocale(session('lang'));
        } else {
            app()->setLocale('ar');
        }
        return $next($request);
    }
}
