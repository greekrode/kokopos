<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function product(Request $request)
    {
        $productId = $request->get('productId');
        $productQty = $request->get('qty');

        $productStock = Product::find($productId)->stock;
        if ($productQty > $productStock->stock) {
            return response($productStock->stock);
        }

        return response('true');
    }
}
