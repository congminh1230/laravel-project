<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::get();
        // dd($products);  
        return view('frontend.product.shop')->with([
            'products' => $products,
        ]);
    }
    public function blog() {
        $posts = Post::get();
        // dd($posts);
        return view('frontend.posts.index')->with([
            'posts' => $posts
        ]);
    }
    public function detail($id) {
        $post = Post::find($id);
        // dd($post->id);
        return view('frontend.blog.index')->with([
            'post' => $post
        ]);
    }
    public function show($id) {
        // dd($id);
        $images = Image::where('product_id',$id)->get();
        $product = Product::find($id);
        $products = Product::get();
        return view('frontend.product.details')->with([
            'product' => $product,
            'images' => $images,
            'products' => $products

        ]);
    }
}
