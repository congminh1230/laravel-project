<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            Cookie::queue('email', $request->get('email'));
            return redirect()->intended('backend/dashboard');
        }else {
            $request->session()->flash('error', 'Tài khoản hoặc mật khẩu không tồn tại!');
            // dd(1);
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
        return redirect('/frontend/home');
    }
}
