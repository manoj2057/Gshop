<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::latest()->get();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $products = product::latest()->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate(
            [
                'product_name' => 'required|max:255|unique:products',
                'product_desc' => 'required',
                'price' => 'required',
                'category_id' => 'required|integer|min:1',
            ],
            [

                'required' => ':attribute field is required.',
                'product_name.required' => 'This field is compulsory.',

            ]



        );
        $product = new product;
        $product->product_name = $request->input('product_name');
        $product->product_desc = $request->input('product_desc');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        if ($request->hasFile('image_upload')) {
            $name = $request->file('image_upload')->getClientOriginalName();
            $request->file('image_upload')->storeAs('public/images', $name);
            // // return storage_path('public/images/'.$name);
            //$image_resize = Image::make(storage_path('app/public/images/'.$name))->resize(300,300);
            //$image_resize->fit(550, 750);
            //$image_resize->save(storage_path('app/public/images/thumbnail/' .$name));

            $product->img = $name;
        }
        if ($product->save()) {
            return redirect()->route('products_list');
        } else {
            return redirect()->back();
        }
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
    public function edit(product $product)
    {
        $categories = category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //$product=  product::find($request->id);
        //return $product;
        $product->product_name = $request->get('product_name');
        $product->product_desc = $request->get('product_desc');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category_id');
        if ($request->hasFile('image_upload')) {
            $name = $request->file('image_upload')->getClientOriginalName();
            $request->file('image_upload')->storeAs('public/images', $name);

            $product->img = $name;
        }
        if ($product->save()) {
            return redirect()->route('products_list');
        } else {
            return redirect()->back();
        }
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        if ($product->delete()) {
            return redirect()->route('products_list');
        } else {
            return redirect()->back();
        }
    }
}
