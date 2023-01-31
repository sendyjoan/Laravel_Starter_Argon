<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product', ['categories' => $categories,'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'stock'=>'required',
            'price'=>'required',
            'category'=>'required',
        ]);

        $product = new Product;
        $product->product_name = $request->get( 'product_name' ) ;
        $product->stock = $request->get( 'stock' ) ;
        $product->price = $request->get( 'price' ) ;
        $product->save();

        $category = new Category;
        $category->id = $request->get('category');
        
        $product->category()->associate($category);
        $product->save();

        return redirect()->route('products.index');
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
        $request->validate([
            'product_name'=>'required',
            'stock'=>'required',
            'price'=>'required',
            'category'=>'required',
        ]);

        $product = Product::with('category')->where('id', $id)->first();
        $product->product_name = $request->get('product_name');
        $product->stock = $request->get( 'stock' ) ;
        $product->price = $request->get( 'price' ) ;
        $product->save();

        $category = new Category;
        $category->id = $request->get('category');

        $product->category()->associate($category);
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('products.index');
    }
}
