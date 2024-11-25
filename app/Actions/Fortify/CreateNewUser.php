<?php

namespace App\Actions\Fortify;

use App\{
    Models\User,
    Http\Requests\Admin\AdminRegisterRequest
};
use Illuminate\Support\{
    Facades\Hash,
    Facades\Validator,
    Validation\Rule
};
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function __construct(
        public AdminRegisterRequest $request
    ) {}

    /**
     * Validate and create a newly registered user.
     *
     * @access public
     * 
     * @param array<string, string>  $input
     * 
     * @return 
     */
    public function create(array $input): User
    {
        
        if ($this->request->isMethod('post')) // execute
        {
            $user = new User;

            // dd($this->request->safe());

            // Hash::make($input['password'])

            $user->user_id = 1;
            $user->name = $this->request->safe()->firstname . ' ' . $this->request->safe()->lastname;
            $user->email = $this->request->safe()->email;
            $user->password = 'null';
            $user->role = 2;

            // return User::create([
            //     'user_id' => 1,
            //     'name' => $this->request->safe()->firstname . ' ' . $this->request->safe()->lastname,
            //     'email' => $this->request->safe()->email,
            //     'password' => 'test',
            //     'role' => 2,
            // ]);

            $user->save();

            return redirect()->route('web.register.password', ['page' => true])->with('status', 'Next Page (2)');
        }

        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique(User::class),
        //     ],
        //     'password' => $this->passwordRules(),
        // ])->validate([
        //     'name.required' => '',
        // ]);

        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);
    }
}
