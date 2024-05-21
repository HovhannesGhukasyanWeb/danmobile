@extends('admin.layout')

@section('title', 'Product')

@section('content')
<div class="w-full">
    <div class="flex items-center w-full justify-between my-4">
        <h1 class="text-2xl font-semibold text-gray-700">Product {{$product->name}}</h1>
    </div>
    <div class="flex items-center justify-end">
        <a href="{{ route('admin.products.index') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
    </div>
    <div class="mt-4">
        <div class="flex items  center gap-4">
            <div class="w-1/2">
                <div class="space-y-2">
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <img src="{{$product->image_url}}" class="w-40 h-40 object-cover" alt="Product image url">
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <p class="text-gray-500">{{$product->name}}</p>
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <p class="text-gray-500">{{$product->description}}</p>
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <p class="text-gray-500">{{$product->price}} $</p>
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Quantity</label>
                        <p class="text-gray-500">{{$product->stock_quantity}}</p>
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Category</label>
                        <p class="text-gray-500">{{$product->category->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection