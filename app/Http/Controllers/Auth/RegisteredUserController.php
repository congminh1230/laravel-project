<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    //
    public function create()
    {
        # code...
        return view('auth.register');
    }
    public function store(Request $request)
    {
        # code...
        // dd($request);
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string','email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        // dd($request);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'require',
        //     'email' => 'required|unique:users',
        //     'password' => 'required|confirmed',
        //  ],
        //  [
        //      'required' => 'Thuộc tính :attribute Không được để trống',
        //      'email.unique' => 'Thuộc tính :attribute đã được đăng ký'
        //  ]
     
        //  );
       $validated = $request->validate([
            'name' => 'required|unique:users|min:3|max:255',
            'email' =>  'required|unique:users',
            'password' => 'required|confirmed',

            ]);
             // dd($validator->fails());
            //  if ($validator->fails()) {
            //      return redirect('register')
            //      ->withErrors($validator)
            //      ->withInput();
            //      }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // Auth::login($user);
        // dd($user);
        return redirect('backend/dashboard');

    }
}
