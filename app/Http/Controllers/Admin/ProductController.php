<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends AdminController{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('show-product');
        $products = Product::latest()->paginate(20);
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
     * @param ProductRequest|ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ProductRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'));
        product::create(array_merge($request->all() , ['images' => $imagesUrl]));
        $request->session()->flash('success', '!محصول با موفقیت ثبت شد');
        return redirect(route('Product.index'));
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
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    { 
        // $this->authorize('edit-product');
        $editproduct=Product::find($product);
       return view ('Admin.product.edit')->with('product',$editproduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        $product=Product::find($product);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $deletedproduct=Product::find($product);
        $deletedproduct->delete();
    return redirect(route('Product.index'));
    }
}
