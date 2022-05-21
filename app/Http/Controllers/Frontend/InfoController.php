<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;

class InfoController extends Controller
{
    public function index() {
        $logos = Logo::get();
        return view('frontend.info.index')->with([
            'logos' => $logos,
        ]);
    }
}
