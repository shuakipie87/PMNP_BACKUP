<?php

namespace App\Services;

use Illuminate\{
    Support\Facades\Http,
    Support\Facades\Config,
};

class RegionApiService
{
     /**
     * Get user api data of the resource.
     * 
     * @access public
     * 
     * @return mixed<int|string, mixed>
     */
    public function getData (): mixed
    {
        $response = Http::get(Config::get('api')['section']['users']);

        if (!$response->ok()) {  
            return $response->throw();
        }

        return $response->object();
    }
}