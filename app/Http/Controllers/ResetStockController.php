<?php

namespace App\Http\Controllers;

use App\Model\ResetStock;
use App\Model\Stock;

class ResetStockController extends Controller
{
    public function reset($id)
    {
        $stock = Stock::find($id);

        $resetStock = new ResetStock();
        $resetStock->product_id = $stock->product->id;
        $resetStock->qty = $stock->stock;
        $resetStock->save();

        $stock->stock = 0;
        $stock->save();

        return redirect()->action('StockController@index')->with('success', sprintf('%s', 'Stock '. $stock->product->name.' reset!'));
    }
}
