<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

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

    public function update($id)
    {
        $product = Product::find($id);
        $product->name = 'Game Pragmata - Updated';
        $product->price = 750000;
        $product->stock = 15;
        $product->category_id = 2;
        $product->description = 'Game action-adventure yang dikembangkan oleh Capcom. (Updated)';
        $product->status = 'tersedia';
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function edit()
    {
        $product = Product::find(7);
        $product->name = 'Game Pragmata - Updated';
        $product->price = 110000;
        $product->stock = 15;
        $product->category_id = 1;
        $product->description = 'Game action-adventure yang dikembangkan oleh Capcom. (Updated)';
        $product->status = 'tersedia';
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function destroy()
    {
        $product = Product::find(7);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

}
