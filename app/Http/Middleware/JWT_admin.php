<?php

namespace App\Http\Middleware;

use Closure;

class JWT_admin
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
        if (auth()->user()->user_type === 1)
            return $next($request);
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
