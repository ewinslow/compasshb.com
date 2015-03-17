<?php namespace CompassHB\Www\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'CompassHB\Www\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        /*
         * A song is at /songs/{slug}
         */
        $router->bind('songs', function ($slug) {
            return \CompassHB\Www\Song::where('slug', $slug)->firstOrFail();
        });

        /*
         * A passage is at /read/{slug}
         */
        $router->bind('read', function ($slug) {
            return \CompassHB\Www\Passage::where('slug', $slug)->published()->firstOrFail();
        });

        /*
         * A fellowship is at /fellowship/{slug}
         */
        $router->bind('fellowship', function ($slug) {
            return \CompassHB\Www\Fellowship::where('slug', $slug)->firstOrFail();
        });

        /*
         * A sermon is at /sermons/{slug}
         */
        $router->bind('sermons', function ($slug) {
            return \CompassHB\Www\Sermon::where('slug', $slug)->published()->firstOrFail();
        });

        /*
         * A blog is at /blog/{slug}
         */
        $router->bind('blog', function ($slug) {
            return \CompassHB\Www\Blog::where('slug', $slug)->published()->firstOrFail();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
