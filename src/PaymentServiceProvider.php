<?php

namespace Sunil\Payments;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
        $this->publishes([
            __DIR__.'/config/config.php' => base_path('config/ggpay.php'),
            __DIR__.'/views/middleware.blade.php' => base_path('app/Http/Middleware/VerifyCsrfMiddleware.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/views', 'sunil');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $gateway = Config::get('indipay.gateway');
        $this->app->bind('indipay', 'Sunil\Payments\GGpay');

        $this->app->bind('Sunil\Payments\Gateways\PaymentGatewayInterface','Sunil\Payments\Gateways\\'.$gateway.'Gateway');
    }
}
