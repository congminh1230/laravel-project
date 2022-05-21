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
        $request -> validate([
            'name'=> ['required','string','max: 255'],
            'email'=> ['required','string','email','max: 255','unique:users'],
            'password'=> ['required','confirmed',Rules\Password::defaults()],
        ]);
            
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // Auth::login($user);
        // dd($user);
        return redirect('/login');

    }
}
