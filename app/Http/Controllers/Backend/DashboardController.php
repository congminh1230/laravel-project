<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
// use Yajra\DataTables\Facades\DataTables;
use Yajra\Datatables\Datatables;
class DashboardController extends Controller
{
    //
    public function index(Request $request) {
        // $path = Storage::disk('public')->path('laravel.png');
        // $path = Storage::disk('public')->get('public');
        // $new_path = Storage::putFile('photo', new File($path));
        // dd($new_path);
        // dd(Storage::disk('public')->path('laravel.png'));

        // $save = Storage::disk('local')->put('file.txt', 'Content');
        // dd($save);
        // dd($content);
        // Thông qua đối tượng request
        // $request->session()->put('name', 'minh');
        // $request->session()->put("cart.products", [['id' => 1, 'item' => 1]]);
        // $sessions = Session::pull("cart.products");
        // dd($sessions);
        // $data = $request->session()->all();
        // return $data;
        // if ($request->session()->has('name')) {
        //     return  'cos';
        // }else {
        //     return 'ko';
        // };
        // $cache = Cache::put('key', 'value', 10);
        // dd($cache);
        // return view('welcome');
        return DataTables::of(User::query())->make(true);

    }
    public function anyData()
    {
        return DataTables::of(User::query())->make(true);
    }
}
