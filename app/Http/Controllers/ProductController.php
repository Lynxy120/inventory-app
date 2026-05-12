<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil produk beserta kategori terkait 
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function insert()
    {
        $product = new Product();
        $product->name = 'Game Pragmata';
        $product->price = 700000;
        $product->stock = 20;
        $product->category_id = 2;
        $product->description = 'Game action-adventure yang dikembangkan oleh Capcom.';
        $product->status = 'tersedia';
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // public function update($id)
    // {
    //     $product = Product::find($id);
    //     $product->name = 'Game Pragmata - Updated';
    //     $product->price = 750000;
    //     $product->stock = 15;
    //     $product->category_id = 2;
    //     $product->description = 'Game action-adventure yang dikembangkan oleh Capcom. (Updated)';
    //     $product->status = 'tersedia';
    //     $product->save();

    //     return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    // }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    // public function edit()
    // {
    //     $product = Product::find(7);
    //     $product->name = 'Game Pragmata - Updated';
    //     $product->price = 110000;
    //     $product->stock = 15;
    //     $product->category_id = 1;
    //     $product->description = 'Game action-adventure yang dikembangkan oleh Capcom. (Updated)';
    //     $product->status = 'tersedia';
    //     $product->save();

    //     return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    // }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.create', compact('product', 'categories'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect()->route('products.index');
    }

}
