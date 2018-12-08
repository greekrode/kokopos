<?php
/**
 * Created by PhpStorm.
 * User: roderickhalim
 * Date: 2018-11-27
 * Time: 21:15
 */

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
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

    public function sales()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $sales = DB::table('sales')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'id',
                'number',
                'total'
            ]);

        return Datatables::of($sales)
            ->addColumn('action', function ($sales) {
                return view('pages.sales.action', compact('sales'))->render();
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
                return view('pages.sales.product_actionaction', compact('sales'))->render();
            })
            ->make(true);
    }

}
