<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

use Illuminate\{
    Http\Request,
    Support\Facades\Auth
};

use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * admin dasbhoard route.
     *
     * Typically, admin are redirected here after authentication.
     *
     * @var string
     */
    protected $admin_ids = [
        1, // super-admin
        2 // admin
    ];

    /**
     * admin dasbhoard route.
     *
     * Typically, guest are redirected here after authentication.
     *
     * @var string
     */
    protected $guest_ids = [
        0, // editor 0 / 4
        3 // guest
    ];

    public function handle($request, Closure $next, ... $roles)
    {
        if (in_array(Auth::user()->role, $this->guest_ids)) return redirect()->route(RouteServiceProvider::ADMIN);

        return $next($request);
    }
}