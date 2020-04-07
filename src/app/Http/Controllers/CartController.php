<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product) {

    }

    public function remove(Product $product) {

    }

    public function index() {
        return view('cart.index');
    }

    public function clear() {
        Cart::clear();

        return back()->with('green', 'Votre panier a bien été vidé.');
    }
}
