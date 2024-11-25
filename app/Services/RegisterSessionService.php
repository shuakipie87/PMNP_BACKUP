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

class RegisterSessionService 
{
    /**
     * Set session data key
     * 
     * @return string
     */
    public $data_key = 'register_data_value';

    /**
     * Set session data [register_data_value]
     * 
     * @param array $data
     * 
     * @return void
     */
    public function setDataSession (array $data = []): void {
        if (count(value: $data) !== 0) {
            session()->put($this->data_key, $data);
        }
    }

    /**
     * Get session data [register_data_value]
     * 
     * @return mixed
     */
    public function getDataSession (): mixed {
        return session()->get($this->data_key);
    }

    /**
     * Remove session data [register_data_value]
     * 
     * @return void
     */
    public function removeDataSession (): void 
    {
        session()->forget($this->data_key);
        session()->flush();
    }

    /**
     * Login Attempts failed session data [register_password_attempts]
     * 
     * @return void
     */
    public function failedLoginAttempts (): void {        
        session()->put('register_password_attempts', 1);
    } 
}
   