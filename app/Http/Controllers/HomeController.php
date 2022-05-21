<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Logo;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $product__featured    = Product::where('status', Product::STATUS_ACTIVE)->get();
        $product_new_arrivals = Product::where('status', Product::STATUS_ACTIVE)->get();
        $product_on_sale      = Product::where('status', Product::STATUS_ACTIVE)->get();
        $san_pham_gioi_han = Product::where('status', Product::STATUS_HOT)->get();
        $product_best_sellers =  Product::where('category_id', 1)->get();
        $product__featured    = Product::where('category_id', 6)->get();
        $categories = Category::get();
        $logos= Logo::get();
        $posts= Post::get();
        // dd($posts);
        // dd($logos);
        return view('frontend.home.index')->with([
            'product_best_sellers' => $product_best_sellers,
            'product__featured'    => $product__featured,
            'product_new_arrivals' => $product_new_arrivals,
            'product_on_sale'      => $product_on_sale,
            'san_pham_gioi_han'    => $san_pham_gioi_han,
            'danh_muc_san_pham'    => $categories,
            'logos'                => $logos,
            'posts' => $posts
        ]);
        return view('frontend.incudes.header')->with([
            'danh_muc_san_pham'    => $categories
        ]);
    }
}
