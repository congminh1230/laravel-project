<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        dd($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // dd($user);
        return redirect('backend/dashboard');

    }
}
