<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd(1);
        // $users = DB::table('users')->count();
        // $price = DB::table('users')->min('id');
        // dd($price);
        $name = request()->get('name');
        $email = request()->get('email');
        $users_query = User::orderBy('created_at','desc')->select('*')->paginate(5);
        if(!empty($email)) {
                $users_query = $users_query->where('email',$email);
        }
        if(!empty($name)) {
            $users_query = $users_query->where('name',$name);
        }
        $users = $users_query;
        // foreach($users as $user) {
        //     dd($user->posts->name);
        // }
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
        // dd(1);
        return view('backend.users.create');
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
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        
        if($request->hasFile('avatar'))
        {
            // dd( $request->file('image'));
            $disk = 'public';
            $path = $request->file('avatar')->store('users', $disk);
            $user->disk = $disk;
            $user->avatar = $path;
        }
        $user->save();

        // // dd($data);
        // DB::table('users')->insert([
        //     'name' => 'min',
        //     'address' => 'sdsd',
        //     'avatar' => $data['avatar'],
        //     // 'phone' => $data['phone'],
        //     'email' => $data['email'],
        //     'password' => $data['password'],
        //     'created_at' => now(),
        //     'updated_at' => now()

        // ]);
        Toastr::success('Tạo Người Dùng Thành Công', 'Thành Công', ["positionClass" => "toast-top-right"]);

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
            $users = User::find($id);
            // dd($posts);
            // $users = User::find($id)->posts;
            // // dd($users);
            // // $userInfo = $users->userInfo;
            // // // dd($userInfo->phone );
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
            $users = DB::table('users')->select(['id','name','avatar'])->find($id);
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
    public function update(Request $request,User $user)
    {
        // dd($request->all());
        $data = $request->all();
        $user = new User();
        // dd($request->hasFile('avatar'));
        if($request->hasFile('avatar'))
        {
            // dd('có');
            $disk = 'public';
            $path = $request->file('avatar')->store('users', $disk);
            $user->disk = $disk;
            $user->avatar = $path;
        }
        $user->name= $data['name'];
        $user->email= $data['email'];
        $user->password= $data['password'];
        $user->save();
        Toastr::success('Update Thành Công', 'Updata', ["positionClass" => "toast-top-right"]);
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
        Toastr::success('Xóa Thành Công', 'Xóa', ["positionClass" => "toast-top-right"]);
            return redirect()->route('backend.users.index');
        }
 
    }
    public function updateAvatar(Request $request, $id) {
        // dd(1);
        $data = $request->all();
        $user = User::find($id);
        // dd($user->name);
        // dd($request->hasFile('avatar'));
        if($request->hasFile('avatar'))
        {
            // dd('có');
            $disk = 'public';
            $path = $request->file('avatar')->store('users', $disk);
            $user->disk = $disk;
            $user->avatar = $path;
        }
        $user->name = $user->name;
        $user->email = $user->email;
        $user->password = $user->password;
        $user->save();
        return redirect()->route('backend.users.index');

    }
   
}
