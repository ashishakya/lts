<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $route)
    {
        $this->mapApiRoutes($route);

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @param Router $route
     *
     * @return void
     */
    protected function mapApiRoutes(Router $route)
    {
        $route->group(
            [
                'prefix'     => 'api/v2',
                'middleware' => 'api',
                'namespace'  => sprintf('%s\Api\spa', $this->namespace),
            ],
            function ($route) {
                require base_path('routes/api.php');
            }
        );
//        Route::prefix('api')
//             ->middleware('api')
//             ->namespace($this->namespace.'\Api')
//             ->group(base_path('routes/api.php'));


    }
}
