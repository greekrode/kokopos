<?php

namespace App\Http\Controllers;

use App\Model\Expense;
use App\Model\Product;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('pages.expense.index');
    }

    public function create()
    {
        $products = Product::all();
        return view('pages.expense.create')->with('products', $products);
    }

    public function store(Request $request)
    {
        $expense = new Expense();
        $expense->product_id = $request->product_id;
        $expense->price = $request->price;
        $expense->save();

        return redirect()->action('ExpenseController@index')->with('success', sprintf('%s', 'Expense '. $request->name.' has been added!'));
    }

    public function edit($id)
    {
        $expense = Expense::find($id);

        return view('pages.expense.edit')->with('expense', $expense);
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->price = $request->price;
        $expense->save();

        return redirect()->action('ExpenseController@index')->with('success', sprintf('%s', 'Expense '. $expense->product->name.' has been updated!'));
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);
        try {
            $expense->delete();
            return redirect()->action('ExpenseController@index')->with('success', sprintf('%s', 'Expense '.$expense->name.' has been deleted!'));
        } catch (\Exception $e)
        {
            return redirect()->action('ExpenseController@index')->with('fail', sprintf('%s', 'Expense '.$expense->name.' can not be deleted!'));
        }
    }
}
