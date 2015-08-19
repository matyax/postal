<?php

namespace App\Providers;

use App\Work;
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

        Work::saving(function ($work) {
            if ($work->position > 0) {
                return true;
            }

            $work->position = Work::max('position') + 1;

            return $work;
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