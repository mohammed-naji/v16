<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function products() {
        // $products = Product::all();
        // $products = Product::paginate(20);
        // $products = Product::simplepaginate(20);
        // $products = Product::orderBy('id', 'desc')->dd();
        // $products = Product::orderBy('id', 'desc')->paginate(20);
        // $products = Product::latest('id')->paginate(20);
        $products = Product::latest('id')->where('price', '>', 600)->paginate(20);
        // dd($products);
        // SELECT * FROM products LIMIT 20 OFFSET 0
        // 1001 / 20 => 51
        // (page - 1) * 20

        // dd($products);
        http://127.0.0.1:8000/products?page=4
        // http://127.0.0.1:8000/products?page=1

        return view('products.index', compact('products'));
    }

    // function show($id) {
    function show(Product $product) {
        // dd($id);
        // $product = Product::find($id);

        // if(!$product) {
        //     abort(404);
        // }

        // $product = Product::findOrFail($id);

        dd($product->price);
    }
}
