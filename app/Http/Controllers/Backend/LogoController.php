<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Brian2694\Toastr\Facades\Toastr;


class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = request()->get('name');
        // dd($name);
        $logos_query = Logo::orderBy('name','desc')->select('*')->paginate(5);
        
        if(!empty($name)){
            $logos_query = Logo::where('name','LIKE',"%$name%")->paginate(2);
        }

        $logos = $logos_query;
        // $logos = Logo::get();
        return view('backend.logos.index')->with([
            'logos' => $logos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.logos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $logo = new Logo();
        $data = $request->all();
        $logo->name = $data['name'];
        // dd($data['name']);
        if($request->hasFile('logo'))
        {
            // dd($request->file('logo'));
            $disk = 'public';
            $path = $request->file('logo')->store('logos', $disk);
            // dd($path);
            $logo->disk = $disk;
            $logo->path = $path;
        }
        $logo->save();
        Toastr::success('Tạo Thương Hiện Thành Công', 'Thành Công', ["positionClass" => "toast-top-right"]);

        return redirect()->route('backend.logo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = Logo::find($id);
        // dd($logo);
        return view('backend.logos.edit')->with([
            'logo' => $logo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $logo = Logo::find($id);
        $logo->name = $data['name'];
        if($request->hasFile('logo'))
        {
            // dd($request->file('logo'));
            $disk = 'public';
            $path = $request->file('logo')->store('logos', $disk);
            // dd($path);
            $logo->disk = $disk;
            $logo->path = $path;
        }
        $logo->update();
        Toastr::success('Update Thành Công', 'Updata', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.logo.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $logo= Logo::find($id);
        $logo->delete();
        Toastr::success('Xóa Thành Công', 'Xóa', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.logo.index');

    }
}
