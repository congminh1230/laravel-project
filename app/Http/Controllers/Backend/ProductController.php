<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at','desc')->select('*')->paginate(5);
            $images = Image::get();
            // dd($products);
            // dd($images);
            // foreach ($products as $product) {
            //     dd($product->image->path);
            // }
       

            return view('backend.products.index')->with([
                'products' =>$products,
                'images' =>$images
            ]);
            
        // dd($products);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::get();
        $tags = Tag::get();
        return view('backend.products.create')->with([
            'categories' => $categories,
            'tags' => $tags
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
        // dd($request);

        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->quantity = $data['quantity'];
        $product->price_origin=$data['price_origin'];
        $product->price_sale= $data['price_sale'];
        $product->status = $data['status'];
        $product->category_id=$data['category_name'];
        $product->save();
        $product_id =  $product->id;
        if($request->hasFile('products'))
        {
            // dd($request->products);
            foreach($request->products as $product){
                $disk = 'public';
                // $path = $request->file('products')->store('products', $disk);
               $name = time().'_'.$product->getClientOriginalName();
            //    dd($name);
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
                    'name' =>$name,
                    'product_id' => $product_id,
                    'disk' => $disk,
                    'path' => $url

                ]);

            }
            // dd('có');
          
        }

        // $user = User::find(1);
        // $user->products()->save($product);
        // Toastr::success('Task was successful!', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.products.index');

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
    public function createImage()
    {
        //
        // dd(1);
        $products=Product::get();
        // $tags = Tag::get();
        return view('backend.images.index')->with([
            'products' =>$products
        ]);
    }
    public function storeImage(Request $request)
    {
        //
        
        // dd($request->hasFile('image'));
        $products=Product::get();
        $image=Image::get();
        $data = $request->all();
        $image->name = $data['name'];
        $image->product_id = $data['category_name'];
        if($request->hasFile('product'))
        {
            // dd('có');
            $disk = 'public';
            $path = $request->file('product')->store('products', $disk);
            // dd($path);
            $image->disk = $disk;
            $image->image = $path;
        }
        $image->save();
        // $tags = Tag::get();
        return view('backend.products.create')->with([
            'products' =>$products
        ]);
    }

}
