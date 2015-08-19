<?php namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Work;
use App\WorkCategory as Category;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index')
                ->with('categories', Category::orderBy('name', 'ASC')->get());
    }

    public function migrate()
    {
        var_dump(\Artisan::call('migrate'));
    }
}