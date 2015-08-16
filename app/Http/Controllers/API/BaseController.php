<?php namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function _response($data) {
        return response()->json($data);
    }
}