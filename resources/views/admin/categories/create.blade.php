@php
    $method = isset($category) ? 'PUT' : 'POST';
    $url = isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store');
@endphp

@extends('admin.layout')

@section('title', 'Category')

@section('content')
<div class="w-full">
    <div class="flex items-center w-full justify-between my-4">
        <h1 class="text-2xl font-semibold text-gray-700">
            {{ isset($category) ? 'Edit' : 'Create' }} Category
        </h1>
        <a href="{{ route('admin.categories.index') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
    </div>
    <div class="mt-4 w-full">
        <div class="flex items-cente justify-center">
            <div style="width: 100%;" class="border border-lightgray p-2 rounded-md shadow-sm">
                <form action="{{ $url }}" class="w-full space-y-3" method="POST">
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
                        <input type="text" name="name" placeholder="Name" value="{{ $category->name ?? '' }}"
                            class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500 w-full">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" placeholder="Description"
                            class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500 w-full resize-none">
                            {{ $category->description ?? '' }}
                        </textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection