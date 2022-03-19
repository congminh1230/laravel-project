<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(1);
        $users = DB::table('users')->count();
        $price = DB::table('users')->min('id');
        // dd($price);
        $name = request()->get('name');
        $email = request()->get('email');
        $users_query = User::select('*');
        if(!empty($email)) {
                $users_query = $users_query->where('email',$email);
        }
        if(!empty($name)) {
            $users_query = $users_query->where('name',$name);
        }
        $users = $users_query->paginate(3);
        return view('backend.users.index')->with([
            'users' => $users
        ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Backend.users.create');
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
            'name','email','password','avatar'
        ]);
        // dd($data);
        DB::table('users')->insert([
            'name' => 'min',
            'address' => 'sdsd',
            'avatar' => $data['avatar'],
            'phone' => '0875741378',
            'email' => $data['email'],
            'password' => $data['password'],
            'created_at' => now(),
            'updated_at' => now()

        ]);
        return redirect()->route('backend.users.index');

     
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
        if($id !== null) {
            // $users = DB::table('users')->select(['id','name','email','phone'])->find($id);
            // return view('Backend.users.show')->with([
            //     'users'=>$users
            // ]);
            // $posts = User::find($id)->posts;
            // dd($posts);
            $users = User::find($id)->posts;
            dd($users);
            // $userInfo = $users->userInfo;
            // // dd($userInfo->phone );
            return view('Backend.users.show')->with([
                'users'=>$users
            ]);
           
        }else {
            return redirect()->back();

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
            $users = DB::table('users')->select(['id','name'])->find($id);
            return view('Backend.users.edit')->with([
                'users'=>$users
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
        DB::table('users')->where('id',$id)->
            update([
                'name' => $data['name'],
            ]);
                return redirect()->route('backend.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
        if($id  ===  'true') {
            $users = User::onlyTrashed()->get();
            // dd($users);
            return view('backend.users.delete')->with([
                'users'=>$users
            ]);
        }else {
            $user = User::onlyTrashed()->where('id', $id)->find($id);
            $user->restore();
            return redirect()->route('backend.users.index');
        }
 
    }
   
}
