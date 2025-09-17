<?php

namespace App\Action\Orders;

use App\Repositories\Interfaces\OrdersRepositoryInterface;
use Exception;

final class PaymentStatus
{
    public function __construct(
        private OrdersRepositoryInterface $ordersRepository
    ) {}

    /*
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
    */
    public function execute(int $id, string $status): void
    {
        $this->ordersRepository->paymentStatus($id, $status);
    }
}
