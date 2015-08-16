<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Parameter;
use Auth;

class AdminController extends Controller {

    public function index()
    {
        return View('admin.index');
    }

    public function dashboard()
    {
        return View('admin.dashboard');
    }

    public function login()
    {
        return View('admin.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin_logout');
    }
}