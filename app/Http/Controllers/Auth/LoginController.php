<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function create() {
        return view('auth.login');
    }
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'], 
            'password' => ['required']                        
        ]);
        if($request->get('remember')) {
            $remember = true;
        }else {
            $remember = false;

        }
        if(Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();
            return redirect()->intended('backend/dashboard');
        }
        return back()->withErrors([
            'email' => 'the provided credentials do not math our records'
        ]);
    }
    public function logout(Request $request) {
        // dd(1);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
