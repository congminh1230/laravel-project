<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request) {
        return view('frontend.posts.index');
    }
    public function show($id) {
        
        return view('frontend.posts.index');
    }
}
