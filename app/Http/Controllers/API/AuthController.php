<?php namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use CMS\User\AuthenticationInterface as UserAuthentication;
use Input;

class AuthController extends BaseController
{
    public function __construct(UserAuthentication $userAuthentication)
    {
        $this->userAuthentication = $userAuthentication;
    }

    public function login()
    {
        if ($this->userAuthentication->attempt(Input::get('email'), Input::get('password'))) {
            $response = [ 'success' => true ];
        } else {
            $response = [ 'success' => false ];
        }

        return $this->_response($response);
    }
}