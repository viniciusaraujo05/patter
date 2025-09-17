<?php

namespace App\Action\Orders;

use App\Repositories\Interfaces\OrdersRepositoryInterface;
use Illuminate\Support\Collection;

class GetOrdersAction
{
    public function __construct(
        private OrdersRepositoryInterface $ordersRepository
    ) {}

    /*
    * @return Collection
    */
    public function execute(): Collection
    {
        try {
            return $this->ordersRepository->getAllOrders();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
