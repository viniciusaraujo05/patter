<?php

namespace App\Services\Orders;

use App\Action\Orders\CreateOrderAction;
use App\Action\Orders\GetOrdersAction;
use App\Models\Orders;
use Illuminate\Support\Collection;

class OrdersService
{

    /*
    * @param CreateOrderAction $createOrderAction
    * @param GetOrdersAction $getOrdersAction
    */
    public function __construct(
        private CreateOrderAction $createOrderAction,
        private GetOrdersAction $getOrdersAction
    ) {}

    /*
    * @param Array $order
    * @return Orders
    */
    public function createOrder(Array $order): Orders
    {
        return $this->createOrderAction->execute($order);
    }

    /*
    * @return Collection
    */
    public function getAllOrders(): Collection
    {
        return $this->getOrdersAction->execute();
    }
}
