<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Logo;

class PostController extends Controller
{
    //
    public function index(Request $request) {
        $posts= Post::orderBy('created_at','desc')->select('*')->paginate(3);
        $categories = Category::get();
        $logos = Logo::get();

        // dd($categories);
        return view('frontend.blog.list')->with([
            'posts'=>$posts,
            'categories'=>$categories,
            'logos' => $logos,

        ]);
    }
    public function show($id) {
        $post = Post::find($id);
        $categories = Category::paginate(5);
        // dd($categories);
        $posts = Post::paginate(4);
        return view('frontend.blog.index')->with([
            'post' => $post,
            'posts'=>$posts,
            'categories'=>$categories
        ]);
        // return view('frontend.posts.index');
    }
    public function searchPosts(Request $request) {
        $categories = Category::get();
        $logos = Logo::get();
        $title = request()->get('title');
        if(!empty($title)){
            $posts_query = Post::where('title','LIKE',"%$title%")->paginate(3);
        }
        $posts = $posts_query;
        return view('frontend.blog.search')->with([
            'posts'=>$posts,
            'categories'=>$categories,
            'logos' => $logos,
        ]);
    }
}
