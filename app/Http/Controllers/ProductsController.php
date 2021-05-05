<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'title' => 'Products',
            'sub_title' => 'Shows the list of products in the store',
            'page' => 'Products',
            'products' => Product::all()
        ];
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Products',
            'sub_title' => 'Add a new product to the store',
            'page' => 'Add new product',

        ];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $product = new Product;

        $product_image = $request->image;

        $product_image_new_name = time() . $product_image->getClientOriginalName();

        $product_image->move('uploads/products', $product_image_new_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = 'uploads/products/' . $product_image_new_name;

        $product->save();

        session()->flash('success', 'Product created.');

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
     *
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Products',
            'sub_title' => 'You can edit the product here',
            'page' => 'Edit product',
            'product' => Product::find($id)
        ];
        return view('products.edit', $data);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        if($request->hasFile('image'))
        {
            $product_image = $request->image;

            $product_image_new_name = time() . $product_image->getClientOriginalName();

            $product_image->move('uploads/products', $product_image_new_name);

            $product->image = 'uploads/products/' . $product_image_new_name;

            $product->save();
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        session()->flash('success', 'Product updated.');

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
        $product = Product::find($id);

        if(file_exists($product->image))
        {
            unlink($product->image);
        }

        $product->delete();

        session()->flash('success', 'Product deleted.');

        return redirect()->back();
    }

}
