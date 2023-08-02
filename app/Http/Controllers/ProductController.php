<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function products() {
        // $products = Product::all();
        // $products = Product::paginate(20);
        // $products = Product::simplepaginate(20);
        // $products = Product::orderBy('id', 'desc')->dd();
        // $products = Product::orderBy('id', 'desc')->paginate(20);
        // $products = Product::latest('id')->paginate(20);
        // $products = Product::latest('id')->where('price', '>', 600)->paginate(20);
        $products = Product::latest('id')->paginate(20);
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

    function create() {
        return view('products.create');
    }

    function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'price' => 'required|numeric|gt:0',
            'content' => 'required'
        ]);

        $path = $request->file('image')->store('images', 'zina');

        // $product = new Product();
        // $product->name = $request->name;
        // $product->image = $path;
        // $product->price = $request->price;
        // $product->content = $request->content;
        // $product->save();

        $data = $request->except('_token','image');
        $data['image'] = $path;
        // dd($data);

        Product::create($data);

        return redirect()
        ->route('products.index')
        ->with('msg', 'Product added successfully')
        ->with('icon', 'success');
    }

    function destroy($id) {
        // Product::destroy($id);
        $product = Product::findOrFail($id);
        File::delete(public_path($product->image));
        $product->delete();
        return $id;

        // return redirect()
        // ->route('products.index')
        // ->with('msg', 'Product deleted successfully')
        // ->with('icon', 'error');
    }

    function update(Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'price' => 'required|numeric|gt:0',
            'content' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $data = $request->except('_token','image');

        if($request->hasFile('image')) {
            File::delete(public_path($product->image));
            $path = $request->file('image')->store('images', 'zina');
            $data['image'] = $path;
        }

        // dd($data);

        $product->update($data);

        return $product;

        // return redirect()
        // ->route('products.index')
        // ->with('msg', 'Product updated successfully')
        // ->with('icon', 'warning');
    }
}
