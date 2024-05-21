<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search', null);
        $products = Product::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->appends(request()->query());

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock_quantity' => 'required|numeric',
        ]);

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->stock_quantity = $request->stock_quantity;
            $product->image_url = $request->file('image_url')->store('products', 'public');
            $product->save();

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.products.index')->withErrors([
                'error' => 'An error occurred while creating the product'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $product->image_url = !str_starts_with($product->image_url, "http") ?
            "data:image/png;base64," . base64_encode(file_get_contents(storage_path('app/public/' . $product->image_url)))
            : $product->image_url;
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock_quantity' => 'required|numeric',
        ]);

        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->stock_quantity = $request->stock_quantity;
            $product->image_url = $request->file('image_url')->store('products', 'public');
            $product->save();

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.products.index')->withErrors([
                'error' => 'An error occurred while creating the product'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Product deleted successfully'], 500);
        }
    }
}
