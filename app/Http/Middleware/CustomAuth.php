<?php
namespace App\Http\Middleware;

use Closure;

class CustomAuth
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
