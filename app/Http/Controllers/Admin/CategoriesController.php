<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search', null);
        $categories = Category::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->appends(request()->query());

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        try {
            Category::create($request->all());

            return redirect()->route('admin.categories.index')
                ->with('success', 'Category created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());

            return redirect()->route('admin.categories.index')
                ->with('success', 'Category updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json(['message' => 'Category deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }
}
