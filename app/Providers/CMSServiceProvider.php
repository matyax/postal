<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class CMSServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.*', 'App\Http\ViewComposers\AuthComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Javascript', function() {
            return new \CMS\Javascript;
        });

        $this->app->bind('CMS\User\AuthenticationInterface', 'CMS\User\Authentication');
        $this->app->bind('CMS\Resource\PersistenceInterface', 'CMS\Resource\Persistence');
    }

}
