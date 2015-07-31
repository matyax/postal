<?php namespace CMS\User;

use Auth;

class Authentication implements AuthenticationInterface
{
    public function attempt($email, $password)
    {
        $success = Auth::attempt([
            'email'     => $email,
            'password'  => $password
        ]);

        if ($success) {
            return Auth::user();
        }

        return false;
    }
}