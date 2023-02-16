<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'pndgw4tjz5t8cb7p',
                'publicKey' => 'x6st3skr4d6t7k2g',
                'privateKey' => '6aba81c09f77f5312ed7e65ba48e197d'
            ]);
        });
        
    }
}
