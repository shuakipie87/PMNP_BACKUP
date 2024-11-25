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

class UserVerifyCodeService 
{   

    /**
     * length limit
     * @return integer 
     **/
    public $length = 12;

    /**
     * instances
     * @access public
     * 
     * @return void 
     **/
    public function __construct () {}

    /**
     * Check code for reset-password resource.
     * 
     * @param string $code default null
     *  
     * @return boolean
     **/
    public function checkCode (string $code = null): bool 
    {
        return false;

        if (!is_null($code) == true && strlen($code) == $this->length) {

            // switch ($code) {
            //     case 'xx' :
            //         return true;
            //     break;
            // }
        } 
    }
}