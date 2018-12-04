<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Sale;
use App\Model\SalesDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $count = Sale::count();
        $now = Carbon::now();
        $count = sprintf('%03d', $count+1);
        $year = $now->year;
        $month = strtoupper($now->shortEnglishMonth);
        $salesNumber = sprintf('%s/%s/%s/%s', 'INV', $count, $month, $year);

        $data = [
            'products' => $products,
            'sales_no' => $salesNumber
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
        $sales = new Sale();
        $sales->number = $request->salesNumber;
        $sales->total = $request->salesTotal;

        if (!$sales->save()) {
            \Session::flash('success', sprintf('%s', 'Sales number '.$request->salesNumber.' can not be created!'));
        }

        foreach ($request->itemData as $itemData) {
            $salesDetails = new SalesDetail();
            $salesDetails->sales_id = $sales->id;
            $salesDetails->product_id = $itemData['itemId'];
            $salesDetails->qty = $itemData['itemQty'];

            if (!$salesDetails->save()) {
                \Session::flash('success', sprintf('%s', 'Sales number '.$request->salesNumber.' can not be created!'));
            }
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
        //
    }
}
