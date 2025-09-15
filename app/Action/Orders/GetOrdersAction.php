<?php

namespace App\Action\Orders;

use App\Repositories\Interfaces\OrdersRepositoryInterface;

class GetOrdersAction
{
    public function __construct(
        private OrdersRepositoryInterface $ordersRepository
    ) {}

    public function execute()
    {
        try {
            return $this->ordersRepository->getAllOrders();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
