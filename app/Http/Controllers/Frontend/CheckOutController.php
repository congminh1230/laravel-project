<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckOutController extends Controller
{
    //
    public function index(Request $request) {
        $products = Cart::content();
        return view('frontend.checkout.index')->with([
            'products' => $products,
        ]);
    }
}
