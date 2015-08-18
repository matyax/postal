<?php

namespace App\Providers;

use App\WorkCategory;
use Illuminate\Support\ServiceProvider;

class PostalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        WorkCategory::saving(function ($workCategory) {
            if ($workCategory->position > 0) {
                return true;
            }

            $workCategory->position = WorkCategory::max('position') + 1;

            return $workCategory;
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}