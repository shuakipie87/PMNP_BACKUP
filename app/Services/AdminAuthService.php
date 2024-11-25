<?php

namespace App\Services;

use App\Http\{
    Resources\UserResource
};
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\{
    Http\Request,
    Support\Facades\Auth,
    Support\Facades\Hash
};

class AdminAuthService 
{
    /**
     * Create token function return collection data
     * 
     * @param string $email
     * @param integer $type
     * 
     * @return mixed<int|string, mixed>
     */
    public function emailAccess (string $email, string $type = 'guard'): mixed {
        return User::where(['email' => $email])->first()->createToken($email);
    }

    /**
     * Create token function return collection data
     * 
     * @param string $email
     * @param integer $id
     * @param mixed $access_data
     * 
     * @return mixed<int|string, mixed>
     */
    public function accessToken (string $email): mixed
    {
        // create token
        $created_token = $this->emailAccess($email)->accessToken;
    }

    /**
     * Create token function return collection data
     * 
     * @param string $email
     * @param integer $id
     * @param mixed $access_data
     * 
     * @return mixed<int|string, mixed>
     */
    public function createToken (string $email, int $id, mixed $access_data): mixed 
    {   
        // create token
        $created_token = $this->emailAccess($email)->accessToken;

        // collection
        $collection = UserResource::collection(User::where(['email' => $email])->get());

        // response
        return [
            $collection,
            'token' => $created_token,
            $access_data,
            'status' => true
        ];
    }   

    // end class
}