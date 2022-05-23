<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::orderBy('created_at','desc')->select('*')->paginate(6);
        $categories = Category::get();
        return view('frontend.product.shop')->with([
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function blog() {
        $posts = Post::get();
        return view('frontend.posts.index')->with([
            'posts' => $posts
        ]);
    }
    public function detail($id) {
        $post = Post::find($id);
        return view('frontend.blog.index')->with([
            'post' => $post
        ]);
    }
    public function show($id) {
        $images = Image::where('product_id',$id)->get();
        $product = Product::find($id);
        $products = Product::get();
        return view('frontend.product.details')->with([
            'product' => $product,
            'images' => $images,
            'products' => $products

        ]);
    }
    public function searchProduct(Request $request) {
        $name = request()->get('name');
        if(!empty($name)){
            $products_query = Product::where('name','LIKE',"%$name%")->paginate(3);
        }
        $posts = Post::get();
        $categories = Category::get();
        $products = $products_query;
        return view('frontend.product.search')->with([
            'products'=>$products,
            'posts'=>$posts,
            'categories' => $categories,
        ]);
    }
    public function searchCategory($id) {
        if(!empty($id)){
            $products_query = Product::where('category_id','LIKE',"%$id%")->paginate(3);
        }
        $posts = Post::get();
        $categories = Category::get();
        $products = $products_query;
        return view('frontend.product.search')->with([
            'products'=>$products,
            'posts'=>$posts,
            'categories' => $categories,
        ]);
    }
}
