<?php

namespace App\Strategies\Interfaces;

interface PaymentStrategyInterface
{
    public function pay($amount);
}
