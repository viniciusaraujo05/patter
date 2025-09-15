<?php

namespace App\Providers;

use App\Services\Orders\OrdersService;
use App\Action\Orders\CreateOrderAction;
use App\Action\Orders\GetOrdersAction;
use Illuminate\Support\ServiceProvider;

class OrdersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(OrdersService::class, function ($app) {
            return new OrdersService(
                $app->make(CreateOrderAction::class),
                $app->make(GetOrdersAction::class)
            );
        });
    }

    public function boot()
    {
    }
}
