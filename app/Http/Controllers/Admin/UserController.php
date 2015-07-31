<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Input;

use Illuminate\Http\Request;

class UserController extends ResourceController {
    public $resource = 'user';

    public function index()
    {
        if (Input::get('ajax')) {
            $users = User::leftJoin('brand_user', 'brand_user.user_id', '=', 'users.id')
                    ->where('brand_id', \Session::get('brand_id'))
                    ->orWhere('user_id', NULL)
                    ->orderBy('name', 'ASC')
                    ->orderBy('lastname', 'ASC')
                    ->get();

            return response()->json(['user' => $users]);
        }

        return parent::index();
    }
}
