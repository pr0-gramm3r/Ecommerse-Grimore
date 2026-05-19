<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('merchant')->check()) {
            return redirect()->route('show.merchant.login');
        }

        return $next($request);
    }

}