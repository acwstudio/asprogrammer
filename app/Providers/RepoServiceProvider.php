<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepoServiceProvider
 *
 * @package App\Providers
 */
class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Repositories\Contracts\SiteInterface',
            'App\Repositories\DB_MySQL\SiteRepository'
        );
    }
}
