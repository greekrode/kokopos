<?php

namespace App\Http\Controllers;

use App\Model\Expense;
use App\Model\Purchase;
use App\Model\ResetStock;
use App\Model\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.report.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPurchase()
    {
        return view('pages.report.index_purchase');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->filter === 'daily') {
            $beginning = Carbon::now()->startOfDay();
            $end = Carbon::now()->endOfDay();
        } else {
            $month = $request->month;
            if ($request->month === null){
                return redirect()->action('ReportController@index')->with('fail', sprintf('%s', 'Please select month!'));
            }
            $beginning = Carbon::createFromDate(null, $month, 1);
            $end = Carbon::instance($beginning)->endOfMonth();
        }
        $sales = Sale::whereBetween('created_at', [$beginning, $end])
                    ->get();
        $expenses = Expense::whereBetween('created_at', [$beginning, $end])
                    ->get();
        $resetStocks = ResetStock::whereBetween('created_at', [$beginning, $end])
                    ->get();

        $data = [
            'sales' => $sales,
            'expenses' => $expenses,
            'resetStocks' => $resetStocks
        ];

        return view ('pages.report.report')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPurchase(Request $request)
    {
        if ($request->filter === 'daily') {
            $beginning = Carbon::now()->startOfDay();
            $end = Carbon::now()->endOfDay();
        } else {
            $month = $request->month;
            $beginning = Carbon::createFromDate(null, $month, 1);
            $end = Carbon::instance($beginning)->endOfMonth();
        }
        $purchases = Purchase::whereBetween('created_at', [$beginning, $end])
            ->get();

        return view ('pages.report.report_purchase')->with('purchases', $purchases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
