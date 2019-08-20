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

        $this->app->bind(
            'App\Repositories\Contracts\AboutInterface',
            'App\Repositories\DB_MySQL\AboutRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\HeaderInterface',
            'App\Repositories\DB_MySQL\HeaderRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\IntroInterface',
            'App\Repositories\DB_MySQL\IntroRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\WorkInterface',
            'App\Repositories\DB_MySQL\WorkRepository'
        );
    }
}
