<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::latest()->paginate(20);
        return view('Admin.product.all' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * /**
     * Store a newly created resource in storage.
     * @param ProductRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ProductRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'));
        product::create(array_merge($request->all() , [ 'images' => $imagesUrl]));

        return redirect(route('product.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
