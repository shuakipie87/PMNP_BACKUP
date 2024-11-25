<?php

namespace App\Services;

use Illuminate\{
    Support\Facades\Http,
    Support\Facades\Config,
};

class UserApiService 
{
     /**
     * Get user api data of the resource.
     * 
     * @access public
     * 
     * @param int $id default 0
     * 
     * @return mixed<int|string, mixed>
     */
    public function getData (int $id = 0): mixed
    {
        $response = Http::get(Config::get('api')['section']['users']);

        if (!$response->ok()) {  
            return $response->throw();
        }

        return $response->object();
    }
}