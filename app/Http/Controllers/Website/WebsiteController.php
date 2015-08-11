<?php namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Input;

class WebsiteController extends Controller {

    public function index()
    {
        return view('website.index');
    }

    public function migrate()
    {
        var_dump(\Artisan::call('migrate'));
    }
}