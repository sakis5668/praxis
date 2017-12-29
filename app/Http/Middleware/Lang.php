<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Closure;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            App::setLocale(Auth::user()->language->language);
        }
        return $next($request);
    }
}
