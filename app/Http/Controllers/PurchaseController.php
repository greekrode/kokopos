<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Purchase;
use App\Model\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.purchase.create')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = Stock::where('product_id', $request->product_id)->get();
        $product = Product::where('id', $request->product_id)->first();

        $purchase = new Purchase([
            'product_id' => $request->product_id,
            'qty' => $request->amount,
            'price' => $request->price
        ]);
        $purchase->save();

        $product->capital_price = $request->price;
        $product->save();

        if (count($stock) > 0) {
            $stock[0]->stock += $request->amount;
        } else {
            $stock = new Stock([
                'stock' => $request->amount,
                'product_id' => $request->product_id
            ]);
        }
        $stock->save();

        return redirect()->action('PurchaseController@index')->with('success', sprintf('%s', 'Product '. $product->name.' has been added!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);

        return view('pages.purchase.edit')->with('purchase', $purchase);
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
        $purchase = Purchase::find($id);
        $purchase->qty = $request->amount;
        $purchase->price = $request->price;
        $purchase->save();

        $stock = Stock::where('product_id', $purchase->product_id)->first();
        $stock->update([
            'amount' => $stock->amount + $request->amount
        ]);

        Product::where('id', $purchase->product_id)->update([
            'capital_price' => $request->price
        ]);

        return redirect()->action('PurchaseController@index')->with('success', sprintf('%s', 'Purchase for product '.$stock->product->name.' has been deleted!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $stock = Stock::where('product_id', $purchase->product_id);
        try {
            $stock->delete();
            $purchase->delete();
            return redirect()->action('StockController@index')->with('success', sprintf('%s', 'Purchase for product '.$stock->product->name.' has been deleted!'));
        } catch (\Exception $e) {
            return redirect()->action('StockController@index')->with('fail', sprintf('%s', 'Purchase for product '.$stock->product->name.' can not be deleted!'));
        }
    }
}
