<?php

namespace App\Http\Controllers\Admin\Demographics;

use App\Http\{
    Requests\UserRequest,
    Requests\Admin\AdminLoginRequest,
    Resources\UserResource,
    Resources\UserCollection,
    Controllers\Controller
};
use App\{
    Services\UserAuthService,
    Services\DashboardSidebarService,
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

class DemographicsController extends Controller
{
    public function show () {
        return view('admin.dashboard.demographics-socio-economic-profiles');
    }
}   
