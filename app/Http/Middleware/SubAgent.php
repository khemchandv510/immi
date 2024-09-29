<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SubAgent
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


        if (Auth::check() &&  Auth::user()->usertype_status == 5 )
        {
            
            return $next($request);
        }

        return redirect('/');
    }
}
