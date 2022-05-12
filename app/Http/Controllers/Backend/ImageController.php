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
        // dd($images);
        // foreach($images as $image) {
        //     // dd($image);
        //     dd($image->product);
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
        //
        // dd($request->hasFile('image'));
        $products=Product::get();
        $data = $request->all();
        // dd($data);
        if($request->hasFile('products'))
        {
            // dd($request->products);
            foreach($request->products as $product){
                $disk = 'public';
                // $path = $request->file('products')->store('products', $disk);
               $name = time().'_'.$product->getClientOriginalName();
                // dd($name);
                $path = Storage::disk($disk)->putFileAs('products',$product,$name);
               $url = Storage::disk($disk)->url($path);
                // dd($path);

                // dd($path);

                // $image-> name = $name;
                $image=Image::get();
                // $image->name = $data['name'];
                // $image->product_id = $data['category_name'];
                // $image->disk=$disk;
                // $image->path= $url;
                // dd($image);
                // $image->save();
                $image = Image::Create([
                    'name' =>$data['name'],
                    'product_id' => $data['category_name'],
                    'disk' => $disk,
                    'path' => $path

                ]);

            }
            // dd('có');
          
        }
        // $tags = Tag::get();
                return redirect()->route('backend.images.index');

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
    }
    // public function store(Request $request)
    // {
        
    //     // dd($request->only('images'));
    //     $data = $request-> all();
    //     $product = new Product();
    //     $product -> name = $data['name'];
    //     $product -> category_id = $data['category_id'];
    //     $product -> description = $data['description'];
    //     $product -> quantity = $data['quantity'];
    //     $product -> price_origin = $data['price_origin'];
    //     $product -> price_sale = $data['price_sale'];
    //     $product->status = $data['status'];
    //     $product->user_id=$data['user_id'];
    //     $product-> save();
    //     if($request->hasFile('images')){
    //         foreach($request->images as $image){
    //             $disk = 'images';
    //            $name = time().'_'.$image->getClientOriginalName();
              
    //            $path = Storage::disk($disk)->putFileAs('products',$image,$name);
    //            $url = Storage::disk($disk)->url($path);
    //            $image = new Image();
    //            $image-> name = $name;
    //            $image->disk=$disk;
    //            $image->path= $url;
    //            $image->product_id = $product->id;
    //            $image -> save();
               
    //         }
    //     }
    //     $request->session()->flash('success', 'Created product successfully');
        
    //     return redirect()->route('backend.products.index');

    // }
}
