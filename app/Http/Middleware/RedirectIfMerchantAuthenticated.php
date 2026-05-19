<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfMerchantAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('merchant')->check()) {
            return redirect()->route('merchant.dashboard');
        }   

        return $next($request);
    }
}
