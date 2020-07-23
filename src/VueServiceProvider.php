<?php

namespace Laravel\Vue;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Laravel\Vue\Blade\LaravelVueScripts;
use Laravel\Vue\Blade\VueComponent;

class VueServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('vue', function ($app) {
            return new Factory;
        });

        $this->publishes([
            __DIR__.'/../public' => public_path(),
        ], 'assets');

        Blade::component('laravel-vue-scripts', LaravelVueScripts::class);
        Blade::component('vue', VueComponent::class);

        View::addNamespace('vue', __DIR__.'/../views');
    }
}
