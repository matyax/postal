<?php namespace CMS\User;

/*
 * User authentication interface.
 */
interface AuthenticationInterface
{
    /*
     * Authenticate using email and password.
     * @param $email
     * @param $password
     * @return User|false The user or false if the attempt failed
     */
    public function attempt($email, $password);
}