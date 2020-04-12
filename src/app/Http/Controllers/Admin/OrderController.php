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
}
