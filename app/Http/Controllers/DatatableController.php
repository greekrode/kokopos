<?php
/**
 * Created by PhpStorm.
 * User: roderickhalim
 * Date: 2018-11-27
 * Time: 21:15
 */

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

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
        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'products.id AS products_id',
                'products.name',
                'products.selling_price',
                'products.capital_price',
                'products.stock',
                'products.image',
                'categories.name AS categories_name'
            ]);

        return Datatables::of($products)
            ->addColumn('action', function ($products) {
                return view('pages.product.action', compact('products'))->render();
            })
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
//            ->addColumn('action', function ($sales) {
//                return view('pages.sales.action', compact('sales'))->render();
//            })
            ->make(true);
    }
}
