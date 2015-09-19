<?php

namespace ConceptByte\TimeTraveller;

use Illuminate\Support\ServiceProvider;

class TimeTravellerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/timetraveller.php' => config_path('timetraveller.php'),
        ], 'config');
        $this->publishes([
            __DIR__.'/Migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
