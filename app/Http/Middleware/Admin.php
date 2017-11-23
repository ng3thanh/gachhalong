<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Admin
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
        if (Sentinel::guest() || !(Sentinel::inRole('admin') || Sentinel::inRole('mod'))) {
            return redirect()->route('get_login');
        }
        
        return $next($request);
    }
}
