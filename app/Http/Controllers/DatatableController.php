<?php
/**
 * Created by PhpStorm.
 * User: roderickhalim
 * Date: 2018-11-27
 * Time: 21:15
 */

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Expense;
use App\Model\Product;
use App\Model\Purchase;
use App\Model\Stock;
use function foo\func;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DatatableController extends Controller
{
    public function category()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $categories = Category::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name']);
        return Datatables::of($categories)
            ->addColumn('action', function ($categories) {
                return view('pages.category.action', compact('categories'))->render();
            })
            ->make(true);
    }

    public function product()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $products = Product::info()->select(['products.*', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);

        return Datatables::of($products)
            ->addColumn('action', function ($products) {
                return view('pages.product.action', compact('products'))->render();
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function stock()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $stocks = Stock::info()->select(['stocks.*', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);

        return Datatables::of($stocks)
            ->addColumn('action', function ($stocks) {
                return view('pages.stock.action', compact('stocks'))->render();
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function sales()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $sales = DB::table('sales')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'id',
                'number',
                'total',
                'created_at'
            ]);

        return Datatables::of($sales)
            ->addColumn('action', function ($sales) {
                return view('pages.sales.action', compact('sales'))->render();
            })
            ->editColumn('created_at', function($sales){
                return date('d-m-Y', strtotime($sales->created_at));
            })
            ->make(true);
    }

    public function salesProducts($id)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $sales = DB::table('products')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'id',
                'name',
                'selling_price',
                'image'
            ])->where('id', '=', $id);

        return Datatables::of($sales)
            ->addColumn('action', function ($sales) {
                return view('pages.sales.action', compact('sales'))->render();
            })
            ->make(true);
    }

    public function purchase()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $purchases = Purchase::info()->select(['purchases.*', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);

        return Datatables::of($purchases)
            ->addColumn('action', function ($purchases) {
                return view('pages.purchase.action', compact('purchases'))->render();
            })
            ->editColumn('created_at', function($purchases){
                return date('d-m-Y', strtotime($purchases->created_at));
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function expense()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $expenses = Expense::info()->select(['expenses.*', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);

        return DataTables::of($expenses)
            ->addColumn('action', function ($expenses) {
                return view('pages.expense.action', compact('expenses'))->render();
            })
            ->editColumn('created_at', function($expenses){
                return date('d-m-Y', strtotime($expenses->created_at));
            })
            ->addIndexColumn()
            ->make(true);
    }

}
