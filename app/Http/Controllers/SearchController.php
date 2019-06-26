<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function product(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $products = Product::where('name', 'like', '%'.$term.'%')->get();

        $formatted_products = [];
        $loop = 1;
        foreach ($products as $product) {
            if ($product->stock){
                if ($product->stock->stock > 0) {
                    $formatted_products[] = ['id' => $loop, 'text' => $product->name, 'price' => $product->selling_price, 'image' => $product->image, 'product_id' => $product->id];
                    $loop ++;
                }
            }
        }

        return \Response::json($formatted_products);
    }
}
