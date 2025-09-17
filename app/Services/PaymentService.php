<?php

namespace App\Services;

use App\Strategies\PaymentStrategyFactory;
use App\Models\Orders;

class PaymentService
{
    public function __construct(
        private PaymentStrategyFactory $paymentStrategyFactory
    ) {}

    public function processPayment(Orders $order): void
    {
        $strategy = $this->paymentStrategyFactory->create($order->payment_method);
        $strategy->pay($order->id);
    }
}
