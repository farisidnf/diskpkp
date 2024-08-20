<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPengusaha
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
        
        if ($request->user()->role == 'pengusaha' || $request->user()->role == 'dinas' || $request->user()->role == 'sudin') {
             return $next($request);
        }

        return redirect()->route('user.error.page');
    }
}
