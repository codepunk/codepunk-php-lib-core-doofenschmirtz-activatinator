<?php

namespace Codepunk\Activatinator\Providers;

use Codepunk\Activatinator\Console\ClearActivationsCommand;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Codepunk\Activatinator\ActivatinatorBrokerManager;

class ActivatinatorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    //protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/activatinator.php');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'codepunk');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'codepunk');

        $this->publishes([
            __DIR__ . '/../../config/activatinator.php' => config_path('codepunk/activatinator.php')],
            'config');

        /*
        $this->publishes([
            __DIR__ . '/../../resources/lang/' => resource_path('lang/vendor/codepunk')],
            'lang');
        */

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('/migrations')],
            'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
        $this->registerActivatinatorBroker();
    }

    /**
     * Register Activatinator commands.
     *
     * @return void
     */
    protected function registerCommands() {
        $this->commands([
            ClearActivationsCommand::class
        ]);
    }

    /**
     * Register the activation broker instance.
     *
     * @return void
     */
    protected function registerActivatinatorBroker() {
        $this->app->singleton('codepunk.activatinator', function (Application $app) {
            return new ActivatinatorBrokerManager($app);
        });

        $this->app->bind('codepunk.activatinator.broker', function (Application $app) {
            return $app->make('codepunk.activatinator')->broker();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['codepunk.activatinator', 'codepunk.activatinator.broker'];
    }
}
