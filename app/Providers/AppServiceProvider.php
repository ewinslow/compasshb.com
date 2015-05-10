<?php namespace CompassHB\Www\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'CompassHB\Www\Services\Registrar');

        $this->app->bind(
            'CompassHB\Www\Repositories\Analytics\AnalyticRepository',
            $this->app->environment() == 'local' ?
                'CompassHB\Www\Repositories\Analytics\FakeAnalyticRepository' :
                'CompassHB\Www\Repositories\Analytics\GoogleAnalyticRepository');
    }
}
