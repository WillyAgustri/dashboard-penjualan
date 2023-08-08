<?php

namespace App\Http\Controllers;

use App\Models\Sales;

class CartController extends Controller
{
    /**
     * Cart.
     */
    public function showCart()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('ShopInterface.Cart', compact('cart', 'totalPrice'));
    }

     public function tambah_ke_keranjang($product_id)
     {
         $product = Sales::findOrFail($product_id);
         $cart = session()->get('cart', []);

         if (isset($cart[$product_id])) {
             ++$cart[$product_id]['quantity'];
         } else {
             $cart[$product_id] = [
                 'product_name' => $product->product_name,
                 'quantity' => 1,
                 'price' => $product->price,
                 'picture' => $product->picture,
                 'brand' => $product->brand,
             ];
         }
         session()->put('cart', $cart);

         return redirect()->back()->with('success', $product->product_name.' Berhasil ditambahkan ke keranjang!');
     }
}