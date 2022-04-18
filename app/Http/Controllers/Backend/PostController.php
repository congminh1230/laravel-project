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
        
        // if($request->user()->cannot('update',Post::class)){
        //     abort(403);
        // }
        $validated = $request->validate([
            'title' => 'required|unique:posts|min:20|max:255',
            'content' => 'required',
            ]);

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|min:20|max:255',
            'content' => 'required',
        ],
        [
            'required' => 'Thuộc tính :attribute là bắt buộc.',
            'content.require' => 'Nội dung không được để trống'
        ]

        );

            // dd($validator->fails());
            if ($validator->fails()) {
                return redirect('backend/posts/create')
                ->withErrors($validator)
                ->withInput();
                }



        $data = $request->only(['title', 'content','status','user_id']);
        $tags = $request->get('tags');
        // dd($tags);
        $post = new Post();
        $post->title = $data['title'];
        $post->user_created_id = 1;
        $post->user_updated_id=1;
        $post->category_id= 1;
        $post->content=$data['content'];
        
        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $post->disk = $disk;
            $post->image = $path;
        }
        $post->save();

        $user = User::find(1);
        $user->posts()->save($post);

        $post->tags()->attach($tags);
        // $request->session()->flash('success', 'Task was successful!');
        Toastr::success('Task was successful!', 'success', ["positionClass" => "toast-top-right"]);
        // if($request->hasFile('image')){
        //     $disk = 'public';
        //     $path = $request->file('image')->store('blogs', $disk);
        //     $post->disk = $disk;
        //     $post->image = $path;
        //     }
            
        // $post -> title = $data['title'];
        // // $post -> slug = Str::slug($data['title']);
        // $post -> content = $data['content'];
        // $post -> category_id = $data['category_id'];
        // $post -> status = $data['status'];
        // $post -> user_created_id = 1;
        // $post -> user_updated_id = 1;
        // $post -> save();
        // $post -> tags()-> attach($tags);
        // $request->session()->flash('success', 'Task was successful!');
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
       
        // dd($request);
        if($request->user()->cannot('update',$post)){
            abort(403);
        }
        $data = $request->all();
        $tags = $request -> get('tags');
        if($request->hasFile('image'))
        {
            // dd( $request->file('image'));
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
        $request->session()->flash('success', 'Update  successful!');
       
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
        $request->session()->flash('success', 'Delete  successful!');
        return redirect()->route('backend.posts.index');
    }
}
