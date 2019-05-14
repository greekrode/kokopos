<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('/home', 'HomeController@index')->name('dashboard');

    Route::resource('category','CategoryController', [
        'names' => [
            'index'     => 'category',
            'store'     => 'category.store',
            'edit'      => 'category.edit',
            'show'      => 'category.show',
            'create'    => 'category.create',
            'update'    => 'category.update',
            'destroy'   => 'category.destroy'
        ]
    ]);

    Route::resource('product', 'ProductController',[
        'names' => [
            'index'     => 'product',
            'store'     => 'product.store',
            'edit'      => 'product.edit',
            'show'      => 'product.show',
            'create'    => 'product.create',
            'update'    => 'product.update',
            'destroy'   => 'product.destroy'
        ]
    ]);

    Route::resource('sales', 'SaleController',[
        'names' => [
            'index'     => 'sales',
            'store'     => 'sales.store',
            'edit'      => 'sales.edit',
            'show'      => 'sales.show',
            'create'    => 'sales.create',
            'update'    => 'sales.update',
            'destroy'   => 'sales.destroy'
        ]
    ]);

    Route::resource('stock', 'StockController',[
        'names' => [
            'index'     => 'stock',
            'store'     => 'stock.store',
            'edit'      => 'stock.edit',
            'show'      => 'stock.show',
            'create'    => 'stock.create',
            'update'    => 'stock.update',
            'destroy'   => 'stock.destroy'
        ]
    ]);

    Route::resource('purchase', 'PurchaseController',[
        'names' => [
            'index'     => 'purchase',
            'store'     => 'purchase.store',
            'edit'      => 'purchase.edit',
            'show'      => 'purchase.show',
            'create'    => 'purchase.create',
            'update'    => 'purchase.update',
            'destroy'   => 'purchase.destroy'
        ]
    ]);

    Route::resource('expense', 'ExpenseController',[
        'names' => [
            'index'     => 'expense',
            'store'     => 'expense.store',
            'edit'      => 'expense.edit',
            'show'      => 'expense.show',
            'create'    => 'expense.create',
            'update'    => 'expense.update',
            'destroy'   => 'expense.destroy'
        ]
    ]);

    Route::resource('supplier', 'SupplierController',[
        'names' => [
            'index'     => 'supplier',
            'store'     => 'supplier.store',
            'edit'      => 'supplier.edit',
            'show'      => 'supplier.show',
            'create'    => 'supplier.create',
            'update'    => 'supplier.update',
            'destroy'   => 'supplier.destroy'
        ]
    ]);

    Route::resource('customer', 'CustomerController',[
        'names' => [
            'index'     => 'customer',
            'store'     => 'customer.store',
            'edit'      => 'customer.edit',
            'show'      => 'customer.show',
            'create'    => 'customer.create',
            'update'    => 'customer.update',
            'destroy'   => 'customer.destroy'
        ]
    ]);

    Route::get('/report', 'ReportController@index')->name('report.index');
    Route::post('/report', 'ReportController@create')->name('report.create');
    Route::get('/report/purchase', 'ReportController@indexPurchase')->name('report.index.purchase');
    Route::post('/report/purchase', 'ReportController@createPurchase')->name('report.create.purchase');

    Route::get('datatable/category', 'DatatableController@category')->name('datatable.category');
    Route::get('datatable/product', 'DatatableController@product')->name('datatable.product');
    Route::get('datatable/sales', 'DatatableController@sales')->name('datatable.sales');
    Route::get('datatable/stock', 'DatatableController@stock')->name('datatable.stock');
    Route::get('datatable/purchase', 'DatatableController@purchase')->name('datatable.purchase');
    Route::get('datatable/expense', 'DatatableController@expense')->name('datatable.expense');
    Route::get('datatable/supplier', 'DatatableController@supplier')->name('datatable.supplier');
    Route::get('datatable/customer', 'DatatableController@customer')->name('datatable.customer');
    Route::get('datatable/sales/products/{id}', 'DatatableController@salesProducts')->name('datatable.sales.products');

    Route::get('search/product', 'SearchController@product')->name('search.product');

    Route::get('ajax/product', 'AjaxController@product')->name('ajax.product');

    Route::get('/delete/sales/{id}', 'DeleteController@delete')->name('delete.sales');
    Route::delete('/delete/sales/{id}', 'DeleteController@destroy')->name('delete.sales_destroy');

    Route::post('/reset/{id}', 'ResetStockController@reset')->name('reset_stock.reset');

});

