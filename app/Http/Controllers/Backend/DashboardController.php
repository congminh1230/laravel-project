<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //
    public function index() {
        $path = Storage::disk('public')->path('laravel.png');
        // $path = Storage::disk('public')->get('public');
        $new_path = Storage::putFile('photo', new File($path));
        // dd($new_path);
        dd($path);
        // dd(Storage::disk('public')->path('laravel.png'));

        // $save = Storage::disk('local')->put('file.txt', 'Content');
        // dd($save);
        // dd($content);
        // return view('dashboard');
    }
}
