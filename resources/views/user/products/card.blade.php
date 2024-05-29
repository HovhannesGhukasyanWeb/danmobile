@php
    $image = $product->image_url;

    if (!Str::startsWith($image, 'http')) {
        $image = "data:image/png;base64, $image";
    }
@endphp

<div class="min-w-[300px] max-h-auto">
    <div class="bg-white shadow-md rounded-md p-5">
        <img src="{{ $image }}" alt="{{ $product->name }}" class="w-full h-60 object-cover rounded-md">
        <div class="mt-5">
            <h2 class="text-xl font-bold">{{ $product->name }}</h2>
            <p class="mt-2 text-gray-500 truncate">{{ $product->description }}</p>
            <p class="mt-2 text-gray-500">Price: <span class="font-bold">${{ $product->price }}</span></p>
            <a href="{{ route('user.products.show', ['product' => $product->id])}}"
                class="mt-5 bg-blue-500 text-white rounded-md px-5 py-2 flex items-center justify-center gap-2">
                View Product
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</div>