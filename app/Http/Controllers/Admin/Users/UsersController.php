<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\{
    Requests\UserRequest,
    Requests\Admin\AdminLoginRequest,
    Resources\UserResource,
    Resources\UserCollection,
    Controllers\Controller
};
use App\{
    Services\UserAuthService,
    Services\UserApiService,
    Models\User
};
use Illuminate\{
    Http\Request,
    Http\RedirectResponse,
    Support\Facades\Auth,
    Support\Facades\Hash,
    Support\Facades\Http,
    Support\Facades\Config,
    Validation\ValidationException
};

class UsersController extends Controller
{
    /**
     * Display a admin of the resource.
     * 
     * @access public
     * 
     * @return mixed<int|string, mixed>
     */
    public function index (UserApiService $service): mixed 
    {
        $users = User::getData();

        // dd($service->getData());

        return view('admin.users.index', compact('users'))->withTitle('Users');
    }

    /**
     * Display a profile of the resource.
     * 
     * @access public
     * 
     * @param App\Http\Request\UserRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function edit (int $id = 0): mixed 
    {
        $param = [
            'body_class' => 'hold-transition sidebar-mini',
            'user' => [
                'name' => ''
            ]
        ];

        $name = Auth::guard(User::ADMIN)->user()->name;
        $query_row = User::getData($id);

        return view('admin.profiles.index', compact('name', 'query_row'))->withTitle('Profile');
    }
}
