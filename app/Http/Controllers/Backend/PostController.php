<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
// use App\Http\Controllers\Auth;
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
        // $users = Post::all();
        // dd($users);
        $title = request()->get('title');
        $status = request()->get('status');
        $posts_query = Post::where('status',1)->select('*');
        if(!empty($title)) {
                $posts_query = $posts_query->where('title',$title);
        }
        if(!empty($status)) {
            $posts_query = $posts_query->where('status',$status);
        }
        $posts = $posts_query->paginate(3);
        return view('backend.posts.index')->with([
            'posts' => $posts
        ]);;
        return view('backend.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(1);
        return view('backend.posts.create');
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
        $data = $request->all();
        
        // dd($data);
        $post = new Post();
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title']);
        $post->user_created_id = 1;
        $post->user_updated_id = 1;
        $post->category_id = 1;
        $post->content = $data['content'];
        $post->save();
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
       
        if($id !== null) {
            // $post = Post::firsWhere('id', $id);
            // dd($post);
            // $posts = DB::table('posts')->select(['id','title','content'])->find($id);
            $posts = Post::find($id);
            $tags = Tag::find($id);
            return view('Backend.posts.edit')->with([
                'posts'=>$posts,
                'tags'=>$tags,
            ]);
           
        }else {
            return redirect()->back();

        }

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
        //
        // $post = Post::find($id);
        // dd($post);
        // if (! Gate::allows('update-post', $post)) {
        //     abort(403);
        // };
        // if($request->user()->cannot('update',$post)) {
        //     abort(403);
        // }
        $this->authorize('update', $post);
        $data = $request->only(['title','content']);
        $data = $request->tag;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->user_id = Auth::user()->id;
        // dd($post);
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
