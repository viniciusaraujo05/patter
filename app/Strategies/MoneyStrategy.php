<?php

namespace App\Strategies;

use App\Strategies\Interfaces\PaymentStrategyInterface;
use App\Action\Orders\PaymentStatus;
use Exception;

class MoneyStrategy implements PaymentStrategyInterface
{
    public function __construct(
        private PaymentStatus $paymentStatus
    ) {}

    public function pay($amount)
    {
        try {
            $this->paymentStatus->execute($amount, 'not_paid');
        } catch (Exception $e) {
            throw new Exception("Payment failed: " . $e->getMessage());
        }
    }
}
