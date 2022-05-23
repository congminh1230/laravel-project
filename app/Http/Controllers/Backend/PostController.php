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
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostRequest;
use Brian2694\Toastr\Facades\Toastr;

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
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = request()->get('title');
        $status = request()->get('status');
        $categories = Category::get();
        $posts_query = Post::orderBy('created_at','desc')->select('*')->paginate(5);
        
        if(!empty($title)){
            $posts_query = Post::where('title','LIKE',"%$title%")->paginate(1);
        }

        if(!empty($status)){
            $posts_query = Post::where('status','LIKE',"%$status%")->paginate(1);
        }

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
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|unique:posts|min:2|max:255',
            'content' => 'required',
            ]);

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|min:3|max:255',
            'content' => 'required',
        ],
        [
            'required' => 'Thuộc tính :attribute là bắt buộc.',
            'content.require' => 'Nội dung không được để trống'
        ]

        );

        if ($validator->fails()) 
        {
            return redirect('backend/posts/create')
            ->withErrors($validator)
            ->withInput();
        }


        $data = $request->all();
        $tags = $request->get('tags');
        $post = new Post();
        $post->title = $data['title'];
        $post->user_created_id = 1;
        $post->user_updated_id=1;
        $post->category_name= $data['category_name'];
        $post->content=$data['content'];
        
        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $post->disk = $disk;
            $post->image = $path;
        }
        $post->save();

        $user = User::find(4);
        $user->posts()->save($post);

        $post->tags()->attach($tags);
        Toastr::success('Tạo Bài Viết Thành Công', 'Thành Công', ["positionClass" => "toast-top-right"]);
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
        $post = Post::find($id);
        return view('backend.posts.show', ['post' => $post ],compact('post'));
      
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
       
        if($request->user()->cannot('update',$post)){
            abort(403);
        }
        $data = $request->all();
        $tags = $request -> get('tags');
        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $post->disk = $disk;
            $post->image = $path;
        }
        $post -> title = $data['title'];
        $post -> content = $data['content'];
        $post -> category_id = $data['category_id'];
        $post -> user_created_id = 1;
        $post -> user_updated_id = 1;
        
        $post -> save();
        $post -> tags()-> sync($tags);
        Toastr::success('Update Thành Công', 'Updata', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.posts.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        //
        $post = Post::find($id);
        $this -> authorize('delete', $post);
        $post -> delete();
        Toastr::success('Xóa Thành Công', 'Xóa', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.posts.index');
    }
}
