<?php

namespace App\Services\Orders;

use App\Action\Orders\CreateOrderAction;
use App\Action\Orders\GetOrdersAction;

class OrdersService
{
    public function __construct(
        private CreateOrderAction $createOrderAction,
        private GetOrdersAction $getOrdersAction
    ) {}

    public function createOrder($order)
    {
        return $this->createOrderAction->execute($order);
    }

    public function getAllOrders()
    {
        return $this->getOrdersAction->execute();
    }
}
