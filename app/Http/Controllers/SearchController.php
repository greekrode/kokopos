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

        $products = Product::search($term)->get();

        $formatted_products = [];

        foreach ($products as $product) {
            $formatted_products[] = ['id' => $product->id, 'text' => $product->name, 'price' => $product->selling_price, 'image' => $product->image];
        }

        return \Response::json($formatted_products);
    }
}
