<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ProductPurchased;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function prepare() {
        if (!\Cart::isEmpty()) {
            $totalPrice = $this->convertPrice(\Cart::getTotal());

            $payment = Mollie::api()->payments()->create([
                'amount' => [
                    'currency' => 'EUR',
                    'value' => $totalPrice
                ],
                'description' => 'Achat d\'un produit provenant de MA FICHE DE REVISION',
                'redirectUrl' => route('payment.check')
            ]);

            if ($this->checkCart($payment->id)) {
                return redirect($payment->getCheckoutUrl(), 303);
            }

            return redirect()->route('home')->with('red', 'Il y a eu un problème avec votre panier. Veuillez réessayer.');
        }
        
        return redirect()->route('home')->with('red', 'Votre panier est vide.');
    }

    public function checkPayment() {
        $order = Auth::user()->orders()->latest()->first();
        $paymentId = $order->payment_token;
        $payment = Mollie::api()->payments()->get($paymentId);

        if (!$payment->isPaid()) {
            ProductPurchased::where(['order_id' => $order->id])->delete();
            $order->delete();
            
            return redirect()->route('cart.index')->with('red', 'Il y a une erreur lors du paiement. Veuillez réessayer.');
        }

        \Cart::clear();

        return redirect()->route('home')->with('green', 'Votre commande a bien été prise en compte. Merci !');
    }

    private function checkCart($paymentToken) {
        $products = \Cart::getContent();
        $totalPrice = \Cart::getTotal();

        $order = Order::create([
            'reference' => Auth::id() . '-' . time(),
            'total_price' => $totalPrice,
            'payment_token' => $paymentToken,
            'user_id' => Auth::id()
        ]);

        $products->each(function ($product, $id) use($order) {
            if ($product->id === $id) {
                $productPurchased = Product::findOrFail($id);

                if ($productPurchased->price === $product->price) {
                    $data = array_merge($productPurchased->toArray(), ['order_id' => $order->id, 'product_id' => $product->id, 'buyer_id' => Auth::id()]);
                    ProductPurchased::create($data);
                }
                else {
                    $order->delete();
                    return redirect()->route('cart.index')->with('red', 'Les prix ne correspondent pas. Veuillez vider votre panier puis réessayer.');
                }
            }
            else {
                $order->delete();
                return redirect()->route('cart.index')->with('red', 'Les références ne correspondent pas. Veuillez vider votre panier puis réessayer.');
            }
        });

        return true;
    }

    private function convertPrice($price) {
        return number_format((float)$price, 2, '.', '');
    }
}
