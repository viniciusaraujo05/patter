<?php

namespace App\Action\Orders;

use App\Models\Orders;
use App\Repositories\Interfaces\OrdersRepositoryInterface;
use App\Services\PaymentService;
use Illuminate\Support\Collection;

class CreateOrderAction
{
    public function __construct(
        private OrdersRepositoryInterface $ordersRepository,
        private PaymentService $paymentService
    ) {}

    /*
    * @param array $orderData
    * @return Orders
    */
    public function execute(array $orderData): Orders
    {
        try {
            $orderData = array_merge([
                'payment_status' => 'pending',
            ], $orderData);

            $order = $this->ordersRepository->createOrder($orderData);

            // Processa o pagamento com a estratégia apropriada
            $this->paymentService->processPayment($order);

            return $order;
        } catch (\Exception $e) {
            throw new \RuntimeException('Falha ao criar pedido: ' . $e->getMessage());
        }
    }
}
