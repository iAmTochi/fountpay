<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class ShoppingController extends Controller
{
    public function addToCart(Request $request){

        $pdt = Product::find($request->pdt_id);

        $cartItem = Cart::add([
            'id'   => $pdt->id,
            'name' => $pdt->name,
            'qty'  => $request->qty,
            'price' => $pdt->price,
        ]);

        //dd(Cart::content());

        Cart::associate($cartItem->rowId, 'App\Product');

        session()->flash('success', $pdt->name." Book added to cart.");

        return redirect()->route('cart');
    }

    public function cart(){
        if(Cart::content()->count() == 0){
            session()->flash('info', "Your cart is empty, do some shopping.");
            return redirect(url('/'));
        }
        //Cart::destroy();
        return view('cart');
    }

    public function cartDelete($id){
        Cart::remove($id);

        session()->flash('success', "Book removed from cart.");

        return redirect()->back();
    }

    public function increment($id, $qty){
        Cart::update($id, $qty + 1);

        session()->flash('success', "Product increased");
        return redirect()->back();
    }

    public function decrement($id, $qty){
        Cart::update($id, $qty - 1);

        session()->flash('success', "Product decreased");
        return redirect()->back();
    }

    public function rapidAddToCart($id){

        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price,
        ]);

        //dd(Cart::content());

        Cart::associate($cartItem->rowId, 'App\Product');

        session()->flash('success', $pdt->name." Book added to cart.");

        return redirect()->back();
    }

    public function clearCart(){
        Cart::destroy();
        session()->flash('success', "Your cart has been clear, start shopping");
        return redirect(url('/'));
    }
}
