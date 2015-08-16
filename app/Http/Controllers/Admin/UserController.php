<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Input;

use Illuminate\Http\Request;

class UserController extends ResourceController {
    public $resource = 'user';
}
