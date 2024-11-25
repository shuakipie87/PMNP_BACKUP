<?php

namespace App\Http\Controllers\Admin\Profiles;

use App\Http\{
    Requests\UserRequest,
    Requests\Admin\ProfileRequest,
    Resources\UserResource,
    Resources\UserCollection,
    Controllers\Controller
};
use App\{
    Services\UserAuthService,
    Models\User,
    Models\UserMeta,
    Models\Master\Regions
};
use Illuminate\{
    Http\Request,
    Http\RedirectResponse,
    Support\Facades\Auth,
    Support\Facades\Hash,
    Validation\ValidationException
};

class ProfileController extends Controller
{
    /**
     * Display a profile of the resource.
     * 
     * @access public
     * 
     * @param UserRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function profile (): mixed 
    {
        // dd(Auth::guard(User::ADMIN)->user());

        $param = [
            'body_class' => 'hold-transition sidebar-mini',
            'user' => [
                'name' => ''
            ]
        ];

        $name = Auth::guard(User::ADMIN)->user()->name;
        $query_row = User::getData(Auth::guard(User::ADMIN)->user()->id);

        $query = User::with(['usermeta'])->get();

        $regions = Regions::query()->get();

        //$query = User::find(Auth::guard(User::ADMIN)->user()->id)->userMeta;
        // dd($query);

        return view('admin.profiles.index', compact(
            'name', 
            'query_row',
            'regions'
        ))->withTitle('Profile');
    }

     /**
     * Execute a profile of the resource.
     * 
     * @access public
     * 
     * @param ProfileRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function execute (ProfileRequest $request): mixed 
    {
        $user_id = Auth::guard(User::ADMIN)->user()->id;

        // method POST
        if ($request->isMethod('post')) // execute
        {
            $users = User::find($user_id);
            $usermeta = User::find($user_id)->usermeta;

            // insert user data
            $users->name = $request->safe()->name;
            $users->email = $request->safe()->email;

            // insert user meta
            $usermeta->gender = $request->safe()->gender;
            $usermeta->phone = $request->safe()->phone;

            // save method
            $users->save();
            $usermeta->save();
            
            // redirect
            return redirect()
                ->route('admin.profile')
                ->with('status', 'Profile updated.');
        }

        return $this->profile();
    }
}
