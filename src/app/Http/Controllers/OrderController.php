<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductPurchased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $allProducts = array_unique(ProductPurchased::pluck('order_id')->all());
        $orders = Order::where(['user_id' => Auth::id()])
            ->whereIn('id', $allProducts)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }
}
