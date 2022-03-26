<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create the controller instance.
     * 
     * @return void
     */
    public function _construct() {
        $this->authorizeResource(Post::class,'post');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $post = Post::all();
        // dd($users);
        // dd($post->tags);
        // $title = request()->get('title');
        // $status = request()->get('status');
        // $posts_query = Post::where('status',1)->select('*');
        // if(!empty($title)) {
        //         $posts_query = $posts_query->where('title',$title);
        // }
        // if(!empty($status)) {
        //     $posts_query = $posts_query->where('status',$status);
        // }
        // $posts = $posts_query->paginate(3);
        // return view('backend.posts.index')->with([
        //     'posts' => $posts
        // ]);;
        // return view('backend.posts.index');
        $title = request()->get('title');
        $status = request()->get('status');
        $categories = Category::get();
        // $posts_query = DB::table('posts')->orderBy('created_at','desc')->select('*')->paginate(5);
        $posts_query = Post::orderBy('created_at','desc')->select('*')->paginate(5);
        // dd($posts_query);

        if(!empty($title)){
            $posts_query = Post::where('title','LIKE',"%$title%")->paginate(1);
        }
        // dd($title);


        if(!empty($status)){
            $posts_query = Post::where('status','LIKE',"%$status%")->paginate(1);
        }
        // dd($status);


        $posts = $posts_query;
        return view('backend.posts.index', ['posts' => $posts , 'categories' => $categories ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        $tags = Tag::get();
        return view('backend.posts.create')->with([
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->only([
        //     'title','content'
        // ]);
        // $data = $request->all();
        
        // // dd($data);
        // $post = new Post();
        // $post->title = $data['title'];
        // $post->slug = Str::slug($data['title']);
        // $post->user_created_id = 1;
        // $post->user_updated_id = 1;
        // $post->category_id = 1;
        // $post->content = $data['content'];
        // $post->save();
        // return redirect()->route('backend.posts.index');
        if($request->user()->cannot('update',Post::class)){
            abort(403);
        }

        $data = $request->only(['title', 'content','status','user_id']);
        $tags = $request->get('tags');
        // dd($tags);
        $post = new Post();
        $post->title = $data['title'];
        // $post->slug= $data['title'];
        // $post->status=$data['status'];
        $post->user_created_id = 1;
        $post->category_id= 1;
        $post->content=$data['content'];
        $post->save();

        $user = User::find(1);
        $user->posts()->save($post);

        $post->tags()->attach($tags);
        
        return redirect()->route('backend.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $post = DB::table('posts')->find($id);
    //    $tag = Tag::find(1);
    //    foreach($tag->posts as $post) {
    //         echo $post->id . $post->title . "</br>";
    //    };
        $post = Post::find($id);
        dd($post->tags);
        foreach($post->tags as $tag) {
            echo $tag->name;
        }   ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        $categories=Category::get();
        $post = DB::table('posts')->find($id);
        $tags = Tag::get();


        return view('backend.posts.edit',
        [
            'post' => $post,
            'categories'=>$categories,
            'tags' => $tags
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
       
        // DB::table('posts')->where('id', $id)->update([
        //     'title' =>  $data['title'],
        // //    'slug' =>  $data['slug'],
        //    'content' =>  $data['content'],
        // //    'user_create_id' => 1,
        // //    'category_id' =>  1,
        //    'status' => $data['status'],
        //    'updated_at' => now()
        // ]);
        // $post = Post::find($id);
        // if(! Gate::allows('update-post',$post)){
        //     abort(403);
        // }
        if($request->user()->cannot('update',$post)){
            abort(403);
        }

        $data = request()->only(['title','content']);
        $tags = $request->get('tags');
        $post->title = $data['title'];
        $post->user_created_id = 1;
        $post->category_id= 1;
        $post->content=$data['content'];
        $post->save();
        return redirect()->route('backend.posts.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        if (! Gate::allows('delete-post', $post)) {
            abort(403);
        };
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('backend.posts.index');
    }
}
