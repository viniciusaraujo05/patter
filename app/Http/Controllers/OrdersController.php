<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Orders\OrdersService;

class OrdersController extends Controller
{
    public function __construct(
        private OrdersService $ordersService
    ) {}

    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'sometimes|string|in:credit_card,debit_card,pix,bank_transfer',
            'payment_status' => 'sometimes|string|in:pending,paid,refunded,failed'
        ]);

        try {
            $order = $this->ordersService->createOrder($validated);
            return response()->json($order, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getAllOrders()
    {
        try {
            $orders = $this->ordersService->getAllOrders();
            return response()->json($orders, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
