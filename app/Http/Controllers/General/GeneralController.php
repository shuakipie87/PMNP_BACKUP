<?php

namespace App\Http\Controllers\General;

use App\Http\{
    Requests\UserRequest,
    Requests\Admin\AdminLoginRequest,
    Resources\UserResource,
    Resources\UserCollection,
    Controllers\Controller
};
use App\{
    Services\UserAuthService,
    Models\User
};
use Illuminate\{
    Http\Request,
    Http\RedirectResponse,
    Support\Facades\Auth,
    Support\Facades\Hash,
    Support\Facades\Http,
    Validation\ValidationException
};
use Fx3costa\LaravelChartjs\Facades\Chartjs;

class GeneralController extends Controller
{
    /**
     * Display a admin of the resource.
     * 
     * @access public
     * 
     * @return mixed<int|string, mixed>
     */
    public function index (): mixed {
        if (Auth::guard(User::ADMIN)->check() !== false) {
            
        }
    }
}