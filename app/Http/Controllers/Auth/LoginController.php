<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{
    //
    public function create() {
        return view('auth.login');
    }
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'], 
            'password' => ['required'],
        ]);
        if($request->get('remember')) {
            $remember = true;
        }else {
            $remember = false;

        }
        if(Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();
            Cookie::queue('email', $request->get('email'));
            return redirect()->intended('/');
        }else {
            $request->session()->flash('error', 'Tài khoản hoặc mật khẩu không tồn tại!');
        }
        return back()->withErrors([
            'email' => 'the provided credentials do not math our records'
        ]);
    }
    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();//vô hiệu hóa session cũ tránh việc sử dụng lại session
        $request->session()->regenerateToken();//regen lại Token khác cho session
        return redirect('/');
    }
    
    
}
