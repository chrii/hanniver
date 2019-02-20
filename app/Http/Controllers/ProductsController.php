<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product-view', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $req = request();
        $categorys = Category::all();

        return view('create-products', ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'product-name' => ['required', 'min:3'],
            'price-wt' => ['required', 'min:3', 'numeric'],
            'product-category' => ['required', 'integer'] ,
            'product-description' => ['required', 'min:3']
        ]);

        Product::create([
            'product_name' => request('product-name'),
            'price_wo_tax' => request('price-wt'),
            'category_id' => request('product-category'),
            'product_description' => request('product-description')
        ]);

        return redirect('products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        return $products;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($products_id)
    {
        $categorys = Category::all();
        $product = Product::findOrFail($products_id);
        return view('edit-product', [
            'product' => $product,
            'categorys' => $categorys
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {   
        request()->validate([
            'product-name' => ['required', 'min:3', 'max:40'],
            'price-wt' => ['required', 'min:3', 'numeric'],
            'product-category' => ['required', 'integer'],
            'product-description' => ['required', 'min:3']
        ]);

        $products = Product::findOrFail($product_id);
        $products->product_name = $request['product-name'];
        $products->category_id = $request['product-category'];
        $products->price_wo_tax = $request['price-wt'];
        $products->product_description = $request['product-description'];

        $products->save();

        return redirect('products');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {

        $product = Product::findOrFail($product_id);
        $product->delete();

        return redirect('products');
    }
}
