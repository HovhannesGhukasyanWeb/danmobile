@extends('admin.layout')

@section('title', 'Categories')

@section('content')
<div class="w-full px-2">
    <div class="flex items-center w-full justify-between my-4">
        <h1 class="text-2xl font-semibold text-gray-700">Categories</h1>
        <a href="{{ route('admin.categories.create') }}"
            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            <i class="fa fa-plus"></i>
            Create new category
        </a>
    </div>
    <div class="flex items-center justify-end">
        <form action="{{ route('admin.categories.index') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search" value="{{ request()->query('search') }}"
                    class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">Search</button>
            </div>
        </form>
    </div>

    <div class="py-2">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
    </div>

    <div>
        <table class="w-full mt-4 datatable">
            <thead>
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="p-2">{{$category->id}}</td>
                        <td class="p-2">{{$category->name}}</td>
                        <td class="p-2">{{$category->description}}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.categories.destroy', $category->id) }}"
                                    class="remove-resource bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    <i class="fas fa-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="w-full flex items-center justify-center p-2">
                                <p class="text-gray-500">No categories found</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="py-2">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection