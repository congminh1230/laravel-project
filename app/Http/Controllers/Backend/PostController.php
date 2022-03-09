<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $posts = DB::table('posts')->orderBy('created_at','desc')
        ->get();
        // dd($posts);
        return view('backend.posts.index')->with([
            'posts' => $posts
        ]);
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
        $data = $request->only([
            'title','content'
        ]);
        // dd($data);
        DB::table('posts')->insert([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'content' => $data['content'],
            'user_created_id' => 1,
            'user_updated_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        return redirect()->route('backend.posts.index');
    //     $data= true;
    //     if($data) {
    //             return redirect()->route('backend.posts.index');
    //             // return redirect()->action([PostController::class , 'index']);
    //     }else {
    //         return redirect()->back();
    //     }
    //    if($request->is('backend/*')) {
    //        dd('dung');
    //    }else {
    //         dd('error');
    //    };
    //    dd($request->path());
    //    dd($request->except('_token'));
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
        
        if($id) {
            return view('backend.posts.index');
        }else {
            return 'dungh';
        }
        

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
            $posts = DB::table('posts')->select(['id','title','content'])->find($id);
            return view('Backend.posts.edit')->with([
                'posts'=>$posts
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
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        DB::table('posts')->where('id',$id)->
            update([
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
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
        DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('backend.posts.index');
    }
}
