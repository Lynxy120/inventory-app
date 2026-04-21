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

}
