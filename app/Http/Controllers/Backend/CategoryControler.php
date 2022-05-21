<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;



class CategoryControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $name = request()->get('name');
        // dd($name);
        $categories_query = Category::orderBy('name','desc')->select('*')->paginate(5);
        
        if(!empty($name)){
            $categories_query = Category::where('name','LIKE',"%$name%")->paginate(2);
        }

        $categories = $categories_query;
        return view('backend.categories.index')->with([
            'categories' => $categories
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
        $categories =Category::get();
        return view('backend.categories.create')->with([
            'categories' => $categories
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
            'name' => 'required|unique:posts|min:2|max:255',
            ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:posts|min:3|max:255',
        ],
        [
            'required' => 'Thuộc tính :attribute là bắt buộc.',
            'name.require' => 'Tên không được để trống',


        ]

        );
        $data = $request->all();
        // dd($data['category_parent']);
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->category_parent = $data['category_parent'];

        $category->save();
        // $request->session()->flash('success', 'Task was successful!');
        Toastr::success('Tạo Thành Công Danh Mục', 'Thành Công', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.categories.index');
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
            // $categories = DB::table('categories')->select(['id','name'])->find($id);
            // dd($id);
            $category = Category::find($id);
            $categories = Category::get();
            // dd($categories);
            // dd($categories);
            // foreach($categories as $category) {
            //     dd($category);
            // }
            return view('Backend.categories.edit')->with([
                'category'=>$category,
                'categories' => $categories
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
        $data = $request->all();
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->category_parent = $data['category_parent'];
        $category->save();
        // $request->session()->flash('success', 'Update  successful!');
        Toastr::success('Chỉnh Sửa Thành Công Danh Mục', 'Thành Công', ["positionClass" => "toast-top-right"]);
        return redirect()->route('backend.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        Category::destroy($id);
        Toastr::success('Xóa Thành Công Danh Mục', 'Thành Công', ["positionClass" => "toast-top-right"]);
        return redirect()-> route('backend.categories.index');
 
    }
}

