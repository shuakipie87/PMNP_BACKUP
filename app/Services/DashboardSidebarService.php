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
    Support\Facades\Hash,
    Support\Facades\Config
};

class DashboardSidebarService 
{   
    /**
     * contruct instances.
     * 
     * @access public
     * 
     * @class /Service @service
     * 
     * @return void
     */
    public function __contruct (): void {}

    /**
     * Manage Dashboard display by role
     * 
     * @param integer $role
     *
     * @return mixed<int|string, mixed>
     */
    public function dashboardConfig (int $role = 1): mixed 
    {
        $menu = [];
        
        switch ($role) {
            case 1:
                $menu = Config::get('menu.default');
            break;
            case 2:
                $menu = [];
            break;
            case 3:
                $menu = [];
            break;
        }

        return compact('menu');
    }

    // end class
}