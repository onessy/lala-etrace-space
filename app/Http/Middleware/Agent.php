<?php

namespace App\Http\Middleware;

use Closure;

class Agent
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
        if (auth()->user()->level == 'Agent'){
            return $next($request);
        }
        elseif (auth()->user()->level == 'Admin') {
            return redirect('/admin');
        }
        else
        {
            return redirect('/client');
        }
    }
}
