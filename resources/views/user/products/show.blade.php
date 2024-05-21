@extends('user.layout')

@section('content')
    <div class="mt-5">
        <div>
            <div class="max-w-1000px mx-auto">
             <div class="p-5">
                <a href="{{ route('user.products.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 gap-2 w-[200px]">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                      </svg> --}}
                      Back to Products
                    </a>
             </div>
                <div class="bg-white rounded-lg shadow-lg p-5 flex items-start gap-4">
                    <img src="{{ $product->image_url }}" alt="Product Image" class="w-[300px] h-[300px]">
                 <div>
                    <h2 class="text-xl font-bold mt-2">{{$product->name}}</h2>
                    <p class="text-sm mb-2 mt-2">{{$product->description}}</p>
                    <p class="text-gray-600">Price: <span class="font-bold text-xl">${{$product->price}}</span></p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                          </svg>
                          Add to Cart
                        </button>
                 </div>
                </div>
            </div>
        </div>
    </div>
@endsection