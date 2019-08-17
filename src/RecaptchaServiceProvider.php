<?php

namespace BrandStudio\Recaptcha;

use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerMiddlewares();
    }

    private function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/recaptcha.php', 'brandstudio.recaptcha'
        );
    }

    private function registerMiddlewares()
    {
        $this->app['router']->aliasMiddleware(
            $this->app['config']['brandstudio']['recaptcha']['middleware_name'],
            Http\Middleware\RecaptchaMiddleware::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'brandstudio');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'brandstudio');

        $this->publishFiles();
    }

    private function publishFiles()
    {
        $this->publishes([
            __DIR__.'/config/recaptcha.php' => config_path('brandstudio/recaptcha.php')
        ], 'config');
        $this->publishes([
            __DIR__.'/resources/views'      => resource_path('views/vendor/brandstudio')
        ], 'views');
        $this->publishes([
            __DIR__.'/resources/lang'      => resource_path('lang/vendor/brandstudio')
        ], 'lang');
    }
}
