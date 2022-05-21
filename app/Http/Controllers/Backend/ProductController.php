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
use Brian2694\Toastr\Facades\Toastr;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = request()->get('name');
        $products_query = Product::orderBy('created_at','desc')->select('*')->paginate(5);
        if(!empty($name)){
            $products_query = Product ::where('name','LIKE',"%$name%")->paginate(2);
        }
        $images = Image::get();
        $products = $products_query;
            return view('backend.products.index')->with([
                'products' => $products,
                'images' => $images
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
        $validated = $request->validate([
            'name' => 'required|unique:products|min:2|max:255',
            'description' => 'required',
            'quantity' => 'required',
            'price_origin' => 'required',

            ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products|min:3|max:255',
            'description' => 'required',
            'quantity' => 'required',
            'price_origin' => 'required',
        ],
        [
            'required' => 'Thuộc tính :attribute là bắt buộc.',
            'name.require' => 'Tên không được để trống',
            'description.require' => 'Nội dung không được để trống',
            'quantity.require' => 'Ít Nhất 1 Số Lượng',
            'price_origin.require' => 'Giá không được để trống',

        ]);

        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->quantity = $data['quantity'];
        $product->price_origin = $data['price_origin'];
        $product->price_sale = $data['price_sale'];
        $product->status = $data['status'];
        $product->category_id = $data['category_name'];
        $product->save();
        $product_id = $product->id;
        if($request->hasFile('products'))
        {
            foreach($request->products as $product){
                $disk = 'public';
               $name = time().'_'.$product->getClientOriginalName();
                $path = Storage::disk($disk)->putFileAs('products',$product,$name);
                $url = Storage::disk($disk)->url($path);
                $image=Image::get();
                $image = Image::Create([
                    'name' =>$name,
                    'product_id' => $product_id,
                    'disk' => $disk,
                    'path' => $url

                ]);

            }
          
        }

        // $user = User::find(1);
        // $user->products()->save($product);
        Toastr::success('Tạo Thành Công Sản Phẩm', 'Thành Công', ["positionClass" => "toast-top-right"]);
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
        // dd($id);
        $product = Product::find($id);
        $categories=Category::get();
        
        return view('backend.products.edit')->with([
            'product' => $product,
            'categories' => $categories,
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
        // dd($id);
        $product = Product::find($id);
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->quantity = $data['quantity'];
        $product->price_origin = $data['price_origin'];
        $product->price_sale = $data['price_sale'];
        $product->status = $data['status'];
        $product->category_id = $data['category_name'];
        // $product->category_id = $data[''];
        $product->update();
        Toastr::success('Update Thành Công', 'Updata', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.products.index');

        
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
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('backend.products.index');
        Toastr::success('Xóa Thành Công', 'Xóa', ["positionClass" => "toast-top-right"]);

    }
    // public function createImage()
    // {
    //     //
    //     // dd(1);
    //     $products=Product::get();
    //     // $tags = Tag::get();
    //     return view('backend.images.index')->with([
    //         'products' =>$products
    //     ]);
    // }
    // public function storeImage(Request $request)
    // {
    //     //
        
    //     // dd($request->hasFile('image'));
    //     $products=Product::get();
    //     $image=Image::get();
    //     $data = $request->all();
    //     $image->name = $data['name'];
    //     $image->product_id = $data['category_name'];
    //     if($request->hasFile('product'))
    //     {
    //         $disk = 'public';
    //         $path = $request->file('product')->store('products', $disk);
    //         $image->disk = $disk;
    //         $image->image = $path;
    //     }
    //     $image->save();
    //     return view('backend.products.create')->with([
    //         'products' =>$products
    //     ]);
    // }

}
