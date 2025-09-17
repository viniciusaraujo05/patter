<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Interfaces\OrdersRepositoryInterface::class,
            \App\Repositories\OrdersRepository::class
        );

        $this->app->bind(\App\Services\PaymentService::class, function ($app) {
            return new \App\Services\PaymentService(
                $app->make(\App\Strategies\PaymentStrategyFactory::class)
            );
        });

        $this->app->bind(\App\Strategies\PaymentStrategyFactory::class, function ($app) {
            return new \App\Strategies\PaymentStrategyFactory(
                $app->make(\App\Action\Orders\PaymentStatus::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
