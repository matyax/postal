<?php namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Work;
use App\WorkCategory as Category;
use Mail;
use Input;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index')
                ->with('categories', Category::orderBy('position', 'ASC')->get())
                ->with('works', Work::orderBy('position', 'ASC')->get())
                ->with('homeWorks', Work::where('display_home', true)->orderBy('position', 'ASC')->get());
    }

    public function migrate()
    {
        var_dump(\Artisan::call('migrate'));
    }

    public function message()
    {
        Mail::send('emails.contact', ['contact' => Input::get('contact')], function ($m) {
            $m  ->to(env('MAIL_CONTACT_ADDRESS'), env('MAIL_NAME'))
                ->subject('Mensaje desde la web');
        });

        return response()->json([
            'data' => [
                'success' => true
            ]
        ]);
    }
}