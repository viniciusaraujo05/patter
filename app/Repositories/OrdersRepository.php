<?php

namespace App\Repositories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\OrdersRepositoryInterface;

class OrdersRepository implements OrdersRepositoryInterface
{
    /*
    * @return Collection
    */
    public function getAllOrders(): Collection
    {
        return new Collection(Orders::all());
    }

    /*
    * @return Orders    
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
    */
    public function getOrderById(int $id): Orders
    {
        return Orders::findOrFail($id);
    }

    /*
    * @return Orders
    */
    public function createOrder(Array $order): Orders
    {
        return Orders::create($order);
    }

    /*
    * @return Orders
    */
    public function updateOrder(int $id, Array $order): Orders
    {
        $order = Orders::find($id);
        $order->update($order);
        return $order;  
    }

    /*
    * @return Orders
    */
    public function deleteOrder(int $id): Orders
    {
        $order = Orders::find($id);
        $order->delete();
        return $order;
    }

    /*
    * @return void
    */
    public function paymentStatus(int $id, string $status): void
    {
        $order = Orders::find($id);
        $order->update(['payment_status' => $status]);
    }
}