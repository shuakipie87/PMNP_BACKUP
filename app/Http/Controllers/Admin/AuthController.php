<?php

namespace App\Http\Controllers\Admin;

use App\Http\{
    Requests\Admin\AdminRegisterRequest,
    Requests\Admin\AdminRegisterPasswordRequest,
    // Requests\Admin\ForgotPasswordRequest,
    Requests\Admin\ResetPasswordRequest,
    Resources\UserResource,
    Resources\UserCollection,
    Controllers\Controller
};
use App\{
    Services\UserAuthService,
    Services\RegisterSessionService,
    Services\UserVerifyCodeService,
    Models\User,
    Mail\ForgotPassword,
    Mail\RegisterUser,
};
use Illuminate\{
    Http\Request,
    Support\Str,
    Support\Facades\Config,
    Support\Facades\Auth,
    Support\Facades\Hash,
    Support\Facades\Mail,
    Support\Facades\Password,
    Auth\Events\PasswordReset,
    View\View,
};
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    /**
     * instances construct parents
     * 
     * @access public
     * 
     * @param UserAuthService $user_service
     * @param RegisterSessionService $register_service
     * @param UserVerifyCodeService $code_service
     * 
     * @return mixed<int|string, mixed>
     */
    public function __construct (
        public UserAuthService $user_service,
        public RegisterSessionService $register_service,
        public UserVerifyCodeService $code_service
    ) {}

    /**
     * Display a register of the resource.
     * 
     * @access public
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function register (Request $request): View 
    {
        $facility_location = Config::get('location.health-care-facility');

        $page = $request->get('page', false);

        $register_data = $this->register_service->getDataSession();
        
        $param = [
            'body_class' => '',
        ];

        $params = compact('param', 'page', 'facility_location', 'register_data');

        return view('admin.register', $params)->withTitle('Register');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \App\Http\Requests\Admin\AdminRegisterRequest $request
     * 
     * @return RedirectResponse
     */
    public function store (AdminRegisterRequest $request): RedirectResponse
    {
        // method POST
        if ($request->isMethod('post')) // execute
        {
            $data = [
                'user_id' => 1,
                'firstname' => $request->safe()->firstname,
                'lastname' => $request->safe()->lastname,
                'facility_location' => $request->safe()->facility_location,
                'facility_id' => $request->safe()->facility_id,
                'email' => $request->safe()->email,
                'phone' => $request->safe()->phone,
                'complete_address' => $request->safe()->complete_address,
                'municipality' => $request->safe()->municipality,
                'province' => $request->safe()->province,
                'password' => null,
                'role' => 2,
            ];

            $this->register_service->setDataSession($data);
        }

        return redirect()->route('web.register.password', ['page' => true])->with('status', 'Next Page (2)');
    }

    /**
     * Page password resource.
     * 
     * @param \App\Http\Requests\Admin\AdminRegisterRequest $request
     * 
     * @return RedirectResponse|View
     */
    public function password (): RedirectResponse|View 
    {
        $register_data = $this->register_service->getDataSession();

        $params = compact('register_data');

        if (!is_null($register_data)) {
            return view('admin.register-password', $params);
        } else {
            return redirect()->route('web.register', ['page' => false])->with('status', 'Login');
        }
    }

    /**
     * Store a newly created password resource.
     * 
     * @param \App\Http\Requests\Admin\AdminRegisterRequest $request
     * 
     * @return RedirectResponse|View
     */
    public function passwordStore (AdminRegisterPasswordRequest $request): RedirectResponse|View 
    {
        $user = new User;

        $register_data = $this->register_service->getDataSession();

        if ($request->isMethod('post')) // execute
        {
            $user->user_id = 1;
            $user->name = $register_data['firstname'] . ' ' . $request['lastname'];

            // $user->facility_location = $register_data['facility_location'];
            // $user->facility_id = $register_data['facility_id'];
                
            $user->email = $register_data['email'];
            $user->password = Hash::make($request->safe()->password);

            // $user->complete_address = $register_data['complete_address'];
            // $user->municipality = $register_data['municipality'];
            // $user->province = $register_data['province'];

            $user->role = 2;

            $user->save();

            $this->register_service->removeDataSession();

            // Mail::to($request->email)->send(new RegisterUser($user));
        }

        return redirect()->route('login')->with('status', 'Login');
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Http\Requests\UserRequest $request
     * @param string|int $id
     * 
     * @return mixed
     */
    public function show (Request $request): mixed {

        return response()->json([
            User::getData($request->id), 'status' => true
        ]);
    }

    /**
     * Display a forgot password of the resource.
     * 
     * @access public
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return View
     */
    public function forgotPassword (Request $request): View 
    {
        $param = [
            'body_class' => ''
        ];

        return view('admin.forgot-password', compact('param'))->withTitle('Forgot Password');
    }

    /**
     * Action a forgot password of the resource.
     * 
     * @access public
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return RedirectResponse|View
     */
    public function forgotPasswordAction (Request $request): RedirectResponse
    {
        $request->validate(['email' => ['required', 'email', 'exists:users,email']]);

        $only_field = $request->only('email');

        $status = Password::sendResetLink($only_field);

        // Mail::to($request->email)->send(new ForgotPassword($user));
        // back()->with(['status' => __($status)])

        return $status === Password::RESET_LINK_SENT 
            ? redirect()->route('forgot-password.message', ['status' => $status])->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Display a forgot password message of the resource.
     * 
     * @access public
     * 
     * @return RedirectResponse|View
     */
    public function forgotPasswordMessage (Request $request): RedirectResponse|View 
    {
        $status = $request->query('status');

        $param = [
            'body_class' => ''
        ];

        return $status === Password::RESET_LINK_SENT
            ? view('admin.forgot-password-message', compact('param'))->withTitle('Forgot Password Message')
            : redirect()->route('forgot-password', )->with('status', 'Redirected');
    }

    /**
     * Page reset-password resource.
     * 
     * @param string $token default
     * 
     * @return RedirectResponse|View
     */
    public function resetPassword (string $token = null): RedirectResponse|View 
    {
        // var_dump(session()->all());
        // var_dump($this->code_service->checkCode($token));

        return view('admin.reset-password', compact('token'));
    }

    /**
     * Action a forgot password of the resource.
     * 
     * @access public
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return RedirectResponse|View
     */
    public function resetPasswordAction (ResetPasswordRequest $request): RedirectResponse 
    {
        $only_field = $request->only('email', 'password', 'password_confirmation', 'token');

        $status = Password::reset(
        $only_field,
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
    
            $user->save();
    
            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);

    }
}
