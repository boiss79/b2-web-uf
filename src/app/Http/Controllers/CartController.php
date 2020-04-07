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
            return back()->with('error', 'Le produit que vous avez sélectionné' . $product->name . ' est déjà dans votre panier !');
        }

        \Cart::add($product->id, $product->name, $product->price, 1, array());

        dd(\Cart::getContent());

        return back()->with('success', $product->name . ' a bien été ajouté au panier !');

    }

    public function remove(Request $request) {
        Cart::remove($request->id);

        return back()->with('success', 'L\'article a bien été supprimé');
    }

    public function index() {
        
    }

    public function clear() {

    }
}
