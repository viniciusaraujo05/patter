<?php

namespace App\Action\Orders;

use App\Repositories\Interfaces\OrdersRepositoryInterface;

class CreateOrderAction
{
    public function __construct(
        private OrdersRepositoryInterface $ordersRepository
    ) {}

    public function execute(array $orderData)
    {
        try {
            // Validate required fields
            $requiredFields = ['user_id', 'product_id', 'quantity', 'amount'];
            foreach ($requiredFields as $field) {
                if (!isset($orderData[$field])) {
                    throw new \InvalidArgumentException("The field {$field} is required");
                }
            }

            $orderData = array_merge([
                'payment_method' => 'credit_card',
                'payment_status' => 'pending',
            ], $orderData);

            return $this->ordersRepository->createOrder($orderData);
        } catch (\Exception $e) {
            throw new \RuntimeException('Failed to create order: ' . $e->getMessage());
        }
    }
}
