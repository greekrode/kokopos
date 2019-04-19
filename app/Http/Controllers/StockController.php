<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Stock;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('pages.stock.index')->with('stocks', $stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.stock.create')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $stock = Stock::find($request->product_id);

        if (!$stock) {
            $stock = new Stock([
                'stock' => $request->amount,
                'product_id' => $request->product_id
            ]);
            $stock->save();

            return redirect()->action('StockController@index')->with('success', sprintf('%s', 'Stock '. $stock->product->name.' has been added!'));
        }

        return redirect()->action('StockController@index')->with('fail', sprintf('%s', 'Stock '. $stock->product->name .' existed, Please update it!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);

        return view('pages.stock.edit')->with('stock', $stock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('stock/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $stock = Stock::find($id);
        $stock->stock = $request->amount;
        $stock->save();

        return redirect()->action('StockController@index')->with('success', sprintf('%s', 'Stock '.$stock->product->name.' has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $product = Product::find($stock->product_id);
        try {
            $stock->delete();
            return redirect()->action('StockController@index')->with('success', sprintf('%s', 'Stock '.$product->name.' has been deleted!'));
        } catch (\Exception $e) {
            return redirect()->action('StockController@index')->with('fail', sprintf('%s', 'Stock '.$product->name.' can not be deleted!'));
        }
    }
}
