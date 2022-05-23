<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //   dd(1);
        $images = Image::get();
        $product = Product::get();
        // foreach($images as $image) {
        //     // dd($image);
        //     dd($image->products);
        // }
        return view('backend.images.index')->with([
            'images' =>$images
        ]);
        //   $products=Product::get();

        //   // $tags = Tag::get();
        //   return view('backend.images.index')->with([
        //       'products' =>$products
        //   ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products=Product::get();
        // $tags = Tag::get();
        return view('backend.images.index')->with([
            'products' =>$products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        // dd(1);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $image = Image::find($id);
        // dd($image);
        return view('backend.images.edit')->with([
            'image' => $image,
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
        $data = $request-> all();
        $image = Image::find($id);
        if($request->hasFile('product'))
        {
            $disk = 'public';
            $path = $request->file('product')->store('logos', $disk);
            $url = Storage::disk($disk)->url($path);
            $image->disk = $disk;
            $image->path = $url;
        }
        $image->update();
        Toastr::success('Update Thành Công', 'Update', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.images.index');
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
        $image = Image::find($id);
        $image->delete();
        return redirect()->route('backend.images.index');
    }
    
}
