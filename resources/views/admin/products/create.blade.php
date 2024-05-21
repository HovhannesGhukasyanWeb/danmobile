@php
    $method = isset($product) ? 'PUT' : 'POST';
    $url = isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store');
    $stock_quantity = isset($product) ? $product->stock_quantity : 0;
    $price = isset($product) ? $product->price : null;
@endphp

@extends('admin.layout')

@section('title', 'Product')

@section('content')
<div class="w-full">
    <div class="flex items-center w-full justify-between my-4">
        <h1 class="text-2xl font-semibold text-gray-700">
            {{ isset($product) ? 'Edit' : 'Create' }} Product
        </h1>
        <a href="{{ route('admin.products.index') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
    </div>
    <div class="mt-4 w-full">
        <div class="flex items-cente justify-center">
            <div style="width: 100%;" class="border border-lightgray p-2 rounded-md shadow-sm">
                <form action="{{ $url }}" class="w-full space-y-3" method="POST" enctype="multipart/form-data">
                    @if($method == 'PUT')
                        @method('PUT')
                    @endif
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" placeholder="Name" value="{{ $product->name ?? '' }}"
                            class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500 w-full">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" placeholder="Description"
                            class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500 w-full resize-none">
                            {{ $product->description ?? '' }}
                        </textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="categoryId" class="w-full p-2 border">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name ?? "" }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" name="stock_quantity" placeholder="Quantity"
                            value="{{ $product->stock_quantity ?? '' }}"
                            class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500 w-full">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="text" name="price" placeholder="Price" value="{{ $product->price ?? '' }}"
                            class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500 w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image_url"
                            class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500 w-full"
                            accept="image/*">
                    </div>
                    <div class=" flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection