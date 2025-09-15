<?php

namespace App\Repositories\Interfaces;

interface OrdersRepositoryInterface
{
    public function getAllOrders();
    public function getOrderById(int $id);
    public function createOrder(Array $order);
    public function updateOrder(int $id, Array $order);
    public function deleteOrder(int $id);
}