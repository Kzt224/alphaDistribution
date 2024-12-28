<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Request;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("Admin.Product",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy("id","desc")->get();
        return view("Admin.AddProduct",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->qty = $request->qty;
        $product->price = $request->price;

        $image_name = date('YmdHms'). "." . request()->product_image->getClientOriginalExtension();
        request()->product_image->move(public_path('images'),$image_name);
        
        $product->image_name = $image_name;
        
        $product->save();
        return redirect('/')->with('message','Product Add Successfully');
     }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
       
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        
        $categories = Category::orderBy("id","desc")->get();
        return view('Admin.Edit_product',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        $product->name  = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->qty = $request->qty;
        $product->price = $request->price;
          
        if(isset($request->product_image)){
            $image_name = date('Ymdhms').".".request()->product_image->getCLientOriginalExtension();
            request()->product_image->move(public_path('images'),$image_name);

            $product->image_name = $image_name;
        }

        $product->save();
        return redirect("/")->with("message","Product edit successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/')->with('message','product delete successfully');
    }
}
