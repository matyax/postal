<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\User;
use Session;
use Input;

use Illuminate\Http\Request;

class WorkCategoryController extends ResourceController {
    public $resource = 'workCategory';
}
