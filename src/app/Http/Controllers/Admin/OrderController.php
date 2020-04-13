<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        return view('admin.orders.index', [
            'orders' => Order::all()
        ]);
    }

    public function show(Order $order) {
        return view('admin.orders.show', [
            'order' => $order
        ]);
    }
}
