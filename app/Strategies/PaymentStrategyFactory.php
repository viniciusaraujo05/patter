<?php

namespace App\Strategies;

use App\Strategies\Interfaces\PaymentStrategyInterface;
use App\Action\Orders\PaymentStatus;
use InvalidArgumentException;

class PaymentStrategyFactory
{
    public function __construct(
        private PaymentStatus $paymentStatus
    ) {}

    public function create(string $paymentMethod): PaymentStrategyInterface
    {
        return match($paymentMethod) {
            'credit_card' => new CreditCartStrategy($this->paymentStatus),
            'money' => new MoneyStrategy($this->paymentStatus),
            default => throw new InvalidArgumentException("Método de pagamento não suportado: {$paymentMethod}")
        };
    }
}
