<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Website
|--------------------------------------------------------------------------
|
*/
Route::group(['namespace' => 'Website'], function () {
    Route::get('/', [
        'as'    => 'home_page',
        'uses'  => 'WebsiteController@index'
    ]);

    Route::get('/migrate', 'WebsiteController@migrate');
});

/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
|
*/
Route::group(['namespace' => 'API', 'prefix' => '/api'], function () {
    Route::post('/login', 'AuthController@login');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
*/
Route::get('/auth/login', 'Admin\AdminController@login');

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin' ], function () {
    Route::get('/login', [
        'as'    => 'admin_login',
        'uses'  => 'AdminController@login'
    ]);

    Route::get('/logout', [
        'as'    => 'admin_logout',
        'uses'  => 'AdminController@logout'
    ]);

    Route::get('/admin', 'AdminController@index');

    Route::get('/dashboard', 'AdminController@dashboard');

    /*
     * Resources
     */
    $resources = [
        'user',
        'work',
        'workCategory'
    ];

    foreach ($resources as $resource){
        Route::resource($resource, ucfirst($resource) . 'Controller');

        Route::post('/' . $resource . '/images', ucfirst($resource) . 'Controller@postImages');
        Route::get('/' . $resource . '/images/{id}', ucfirst($resource) . 'Controller@getImages');
        Route::delete('/' . $resource . '/images/{id}', ucfirst($resource) . 'Controller@deleteImage');
        Route::get('/' . $resource . '/export/xls', ucfirst($resource) . 'Controller@export');
    }
});
