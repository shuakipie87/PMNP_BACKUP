<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\{
    Http\Request,
    Http\RedirectResponse,
    Support\Facades\Auth,
    Support\Facades\Hash,
    Validation\ValidationException
};

class AccessibilityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        

        return $next($request);
    }
}
