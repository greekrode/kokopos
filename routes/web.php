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
});

