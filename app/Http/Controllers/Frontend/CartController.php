<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function add($id) {
        $product = Product::find($id);
        Cart::add($product->id, $product->name,$product->quantity , $product->price_origin);
      
        return redirect()->route('frontend.carts.index');
    }
    public function index() {
        $products = Cart::content();
        $cart = Cart::total();
        return view('frontend.carts.index')->with([
            'products' => $products,
        ]);
    }
    public function delete($id) {
        $products = Cart::remove($id);
        return redirect()->route('frontend.carts.index');
    }
    public function destroy() {
        Cart::destroy();
        return redirect()->route('home');
    }
    public function update(Request $request) {
        $products = Cart::content();
        foreach($products as $product) {
            // dd($product->rowId);
        Cart::update($product->rowId,$request->qty); // Will update the id, name and price


        }
        return redirect()->route('frontend.carts.index');

    }
    public function store(Request $request) {


    }
}
