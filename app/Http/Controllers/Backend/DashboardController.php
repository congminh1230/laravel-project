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
        return view('dashboard');
    }
    public function anyData()
    {
        return DataTables::of(User::query())->make(true);
    }
}
