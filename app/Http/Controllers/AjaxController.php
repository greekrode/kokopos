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

        $product = Product::find($productId);
        if ($productQty > $product->stock) {
            return response($product->stock);
        }

        return response('true');
    }
}
