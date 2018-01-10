<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsUser
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

        if (! (Auth::user()->isAdmin() || \Auth::user()->isUser()) ) {
            return redirect('/calendar');
        }
        return $next($request);
    }
}
