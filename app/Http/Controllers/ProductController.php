<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Products;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('admin');
        $this->middleware('permission:products-list|products-create|products-edit|products-delete', ['only' => ['index','store']]);
        $this->middleware('permission:products-create', ['only' => ['create','store']]);
        $this->middleware('permission:products-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:products-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $paginate = 10;
        $where = [];

        if(!empty($keyword)) {
            $where[] = ['product_name', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['products'] = \App\Products::paginate($paginate);
        }
        else {
            $data['products'] = \App\Products::where($where)->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        return view('product.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_name' => 'required|min:5|max:50|string',
            'product_max_db' => 'required',
            'product_price' => 'required|numeric',
            'product_status' => 'required|string',
            'product_desc' => 'required|string'
        ]);

        $input = $request->all();

        $product = Products::create($input);

        return redirect()->route('products.index')->with('success','Created Product Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] = \App\Products::find($id);
        return view('product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = \App\Products::find($id);
        return view('product.edit', $data);
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
        $this->validate($request,[
            'product_name' => 'required|min:5|max:50|string',
            'product_max_db' => 'required',
            'product_price' => 'required|numeric',
            'product_status' => 'required|string',
            'product_desc' => 'required|string'
        ]);

        $product = Products::find($id);
        $product->product_name = $request->product_name;
        $product->product_max_db = $request->product_max_db;
        $product->product_price = $request->product_price;
        $product->product_status = $request->product_status;
        $product->product_desc = $request->product_desc;
        $product->save();

        return redirect()->route('products.index')->with('info','Updated Product Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect()->route('products.index')->with('warning','Deleted Product Successfully');
    }
}
