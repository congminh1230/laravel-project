<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $product_best_sellers = Product::where('status', Product::STATUS_ACTIVE)->get();
        $product__featured    = Product::where('status', Product::STATUS_ACTIVE)->get();
        $product_new_arrivals = Product::where('status', Product::STATUS_ACTIVE)->get();
        $product_on_sale      = Product::where('status', Product::STATUS_ACTIVE)->get();
        // dd($product__featured);
        return view('frontend.home.index')->with([
            'product_best_sellers' => $product_best_sellers,
            'product__featured'   => $product__featured,
            'product_new_arrivals' => $product_new_arrivals,
            'product_on_sale'      => $product_on_sale,
        ]);
    }
}
