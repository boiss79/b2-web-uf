<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request) {

        $product = Product::find($request->id);

        if (\Cart::get($product->id)) {
            return back()->with('red', 'Le produit ' . $product->name . ' est déjà dans votre panier.');
        }

        \Cart::add($product->id, $product->name, $product->price, 1, array());

        return back()->with('green', $product->name . ' a bien été ajouté au panier !');

    }

    public function remove(Request $request) {
        \Cart::remove($request->id);

        return back()->with('green', 'L\'article a bien été supprimé');
    }

    public function index() {
        return view('cart.index');
    }

    public function clear() {
        \Cart::clear();

        return back()->with('green', 'Votre panier a bien été vidé.');
    }
}
