<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $product =Product::all();
        return view("products.index",["products"=>$product]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view("products.create",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:3|unique:categories",
            "image" =>"required|image|mimes:jpg,png,jpeg,gif|max:2048"
        ]);
        //
        if($request->hasFile("image")){
            $imageName =time().".".$request->image->extension();

            $request->image->move(public_path("img"),$imageName);

        $product =new Product;
        $product -> name =$request->name;
        $product -> description =$request->description;
        $product -> image =$imageName;
        $product -> price =$request->price;
        $product -> quantity =$request->quantity;
        $product -> category_id =$request->category_id;
        // $product->category_id =Auth::id();
        $product->save();

        return to_route("products.index");
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        // $product =Product::findorfail($id);
        return view('products.showStudent',["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        // $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            "name" => "required|min:3",
            "image" => "required",
            "grade" => "integer"
        ], [
            "name.required" => "student name is required",
            "name.min" => "student name is not valid",
            "image.required" => "student image is required"
        ]);

        // $product = Product::findOrFail($id);
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->image = $request->input("image");
        $product->price = $request->input("price");
        $product->quantity = $request->input("quantity");
        $product->save();


        return to_route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        // $product = Product::find($id);
        $product ->delete();

        return to_route("products.index");
    }
}
