<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()){
            return redirect(route('view'))->with('error','Permission Denied!!! You do not have access.');
        }
        else{
            return $next($request);
        }
    }
}
