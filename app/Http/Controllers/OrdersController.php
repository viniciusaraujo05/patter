<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Orders\OrdersService;

class OrdersController extends Controller
{
    public function __construct(
        private OrdersService $ordersService
    ) {}

    /*
    * @param Request $request
    * @return JsonResponse
    */
    public function createOrder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'string|in:credit_card,money',
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

    /*
    * @return JsonResponse
    */
    public function getAllOrders(): JsonResponse
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
