<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Product;
use App\Model\Sale;
use App\Model\SalesDetail;
use App\Model\Stock;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();

        $count = Sale::count();
        $now = Carbon::now();
        $count = sprintf('%03d', $count+1);
        $year = $now->year;
        $month = strtoupper($now->shortEnglishMonth);
        $salesNumber = sprintf('%s/%s/%s/%s', 'INV', $count, $month, $year);

        $data = [
            'products' => $products,
            'sales_no' => $salesNumber,
            'customers' => $customers
        ];
        return view('pages.sales.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $sales = new Sale();
        $sales->number = $request->salesNumber;
        $sales->total = $request->salesTotal;
        $sales->customer_id = $request->salesCustomer;
        $sales->user_id = Auth::user()->id;

        if (!$sales->save()) {
            \Session::flash('success', sprintf('%s', 'Sales number '.$request->salesNumber.' can not be created!'));
            return response('failed');
        }

        foreach ($request->itemData as $itemData) {
            $salesDetails = new SalesDetail();
            $salesDetails->product_id = $itemData['itemId'];
            $salesDetails->qty = $itemData['itemQty'];

            $stock = Stock::where('product_id',$itemData['itemId'])->first();
            $stock->stock -= $itemData['itemQty'];

            if ($stock->stock > 0) {
                $salesDetails->sales_id = $sales->id;
                $stock->save();
            } else {
                $product = Product::find($itemData['itemId']);
                \Session::flash('fail', sprintf('%s', 'Product '.$product->name.' stock is not enough!'));
                DB::rollBack();
                return response('failed');
            }

            if (!$salesDetails->save()) {
                \Session::flash('success', sprintf('%s', 'Sales number '.$request->salesNumber.' can not be created!'));
                DB::rollBack();
                return response('failed');
            }

            DB::commit();
        }

        \Session::flash('success', sprintf('%s', 'Sales number '.$request->salesNumber.' has been added!'));

        return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = Sale::find($id);
        $salesDetails = SalesDetail::where('sales_id', $sales->id)->get();

        $data = [
            'sales' => $sales,
            'salesDetails' => $salesDetails
        ];

        return view('pages.sales.show')->with($data);
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
        $sale = Sale::find($id);

        try {
            $salesDetails = SalesDetail::where('sales_id', $sale->id)->get();
            foreach ($salesDetails as $sd) {
                $stockAmount = Stock::where('product_id', $sd->product_id)->first()->stock;
                Stock::where('product_id', $sd->product_id)->update(['stock' => $stockAmount + $sd->qty ]);
            }
            SalesDetail::where('sales_id', $sale->id)->delete();
            $sale->delete();
            return redirect()->action('SaleController@index')->with('success', sprintf('%s', 'Sales number '.$sale->number.' has been deleted!'));
        } catch (\Exception $e) {
            return redirect()->action('SaleController@index')->with('fail', sprintf('%s', 'Sales number '.$sale->number.' can not be deleted!'));
        }
    }
}
