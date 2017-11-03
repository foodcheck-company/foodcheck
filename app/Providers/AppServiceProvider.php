<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register any collection macros
     *
     * @return void
     */
    public function registerCollectionMacros()
    {
        Collection::macro('present', function ($class, ...$args) {
            return $this->map(function ($model) use ($class, $args) {
                return new $class($model, $args);
            });
        });

        Collection::macro('presentArray', function ($class, ...$args) {
            return $this->map(function ($model) use ($class, $args) {
                $obj = new $class($model, $args);
                return $obj->toArray();
            });
        });
    }
}
