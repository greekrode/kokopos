<?php

namespace App\Http\Controllers;

use App\Model\Sale;
use App\Model\SalesDetail;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeleteController extends Controller
{
    public function delete($id) {
        $sale = Sale::find($id);

        return view('pages.sales.password')->with('sale', $sale);
    }

    public function destroy(Request $request, $id){
        $user = User::where('email', 'admin@admin.com')->first();
        if (Hash::check($request->password, $user->password)) {
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
        } else {
            return redirect()->action('SaleController@index')->with('fail', 'Password doesn\'t match!');
        }
    }
}
