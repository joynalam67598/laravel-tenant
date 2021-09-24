<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class IsPasswordSetMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->password=='secret'
            && !$request->password && !$request->is('set-password'))
        {
            return redirect('set-password');
        }
        return $next($request);
    }
}
