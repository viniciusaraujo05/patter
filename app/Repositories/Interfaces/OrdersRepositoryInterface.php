<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use App\Models\Orders;

interface OrdersRepositoryInterface
{
    public function getAllOrders(): Collection;
    public function getOrderById(int $id): Orders;
    public function createOrder(Array $order): Orders;
    public function updateOrder(int $id, Array $order): Orders;
    public function deleteOrder(int $id): Orders;
    public function paymentStatus(int $id, string $status): void;
}