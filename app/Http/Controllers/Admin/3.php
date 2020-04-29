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
        $products = Product::latest()->paginate(20);
        return view('Admin.product.all' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     * 
     * 
     *
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
     * @param ProductRequest|ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ProductRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'));
        product::create(array_merge($request->all() , ['images' => $imagesUrl]));

        return redirect(route('Product.index'));
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
     * @param  \int $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Product $id)
    // {
    //     $editproduct=Product::find($id);
    
    //    return view ('Admin.Product.edit')->with('product',$editproduct);
    // }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editproduct=Product::find($id);
       return view ('Admin.Product.edit')->with('product',$editproduct);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        
        $file = $request->file('images');
        $inputs = $request->all();

        if($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $product->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $product->update($inputs);

        return redirect(route('Product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
    $product->delete();
    return redirect(route('Product.index'));
    }
}
