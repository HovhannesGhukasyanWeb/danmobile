@extends('admin.layout')

@section('title', 'Orders')

@section('content')
<div class="w-full px-2">
    <div class="flex items-center w-full justify-between my-4">
        <h1 class="text-2xl font-semibold text-gray-700">Orders</h1>
    </div>
    <div class="flex items-center justify-end">
        <form action="{{ route('admin.orders.index') }}" method="GET">
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
                    <th class="py-2">Quantity</th>
                    <th class="py-2">Price</th>
                    <th class="py-2">Category</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="py-2">
        </div>
    </div>
</div>
@endsection