<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnsureSessionIsSet
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasSession()) {
            $request->setSession(app('session')->driver()->getSession());
        }

        return $next($request);
    }
}

