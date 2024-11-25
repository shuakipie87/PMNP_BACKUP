<?php

namespace App\Http\Controllers\API;

use App\Http\{
    Requests\UserRequest,
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
    Support\Facades\Auth,
    Support\Facades\Hash
};

class AuthController extends Controller
{
    // isntances

    /**
     * @param public UserAuthService $services
     */
    public function __construct (
        public UserAuthService $services
    ) {}

    /**
     * Display a listing of the resource.
     * 
     * @param App\Http\Request\UserRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function index (Request $request): mixed {
        return response()->json([
            User::getDataByToken($request->id, $request->token), 'status' => true
        ]);
    }

    /**
     * Display a listing of the resource.
     * 
     * @param App\Http\Request\UserRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function login (UserRequest $request): mixed 
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where(['email' => $email])->first();

        if (!$user || !Hash::check($password, $user->password))
        {
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);

            return response()->json([
                'email' => 'The provided credentials are incorrect.',
                'status' => false
            ]);
        }

        $created_token = $user->createToken(
            $email,
            ['*'], 
            now()->addWeek()
        )->accessToken;

        // ->accessToken
        // ->refreshToken

        if ($user) {
            // $request->session()->put();
            Auth::guard(User::GUARD)->login($user);
            // update token
            $access_data = User::updateToken($created_token['id'] ?? 0);
        }

        // response
        return response()->json($this->services->createToken(
            $email, 
            $created_token['id'] ?? 0, 
            $access_data
        ), 200);
   
    }

    /**
     * Display a register of the resource.
     * 
     * @access public
     * 
     * @return mixed<int|string, mixed>
     */
    public function register (): mixed 
    {
        $param = [
            'body_class' => ''
        ];

        return view('admin.register', compact('param'))->withTitle('Register');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param App\Http\Request\UserRequest $request
     * 
     * @return mixed<int|string, mixed>
     */
    public function store (Request $request): mixed
    {
        return response()->json([
            User::getDataByToken($request->id, $request->token), 'status' => true
        ]);
    }

    /**
     * Display the specified resource.
     * 
     * @param App\Http\Request\UserRequest $request
     * @param string|int $id
     * 
     * @return mixed
     */
    public function show (Request $request): mixed 
    {
        $token = $request->bearerToken();

        return response()->json([
            'token' => $token,
            'data' => User::getData($request->id),             
            'status' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
