<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('user.products.show', compact('product'));
    }
}
