<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'capital_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('category/create')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        \Storage::disk('public')->put($image->getFilename().'.'.$extension, \File::get($image));

        $product = new Product([
            'name' => $request->name,
            'capital_price' => $request->capital_price,
            'selling_price' => $request->selling_price,
            'mime' => $image->getClientMimeType(),
            'original_image' => $image->getClientOriginalName(),
            'image' => $image->getFilename().'.'.$extension,
            'category_id' => $request->category_id
        ]);
        $product->save();

        return redirect()->action('ProductController@index')->with('success', sprintf('%s', 'Product '.$request->name.' has been added!'));
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
        //
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
        try {
            $product->delete();
            return redirect()->action('ProductController@index')->with('success', sprintf('%s', 'Product '.$product->name.' has been deleted!'));
        } catch (\Exception $e) {
            return redirect()->action('ProductController@index')->with('fail', sprintf('%s', 'Product '.$product->name.' can not be deleted!'));
        }
    }
}
