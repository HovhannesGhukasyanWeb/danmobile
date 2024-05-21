@extends('user.layout')

@section('content')
    <div class="mt-5">
        <div class="max-w-[1000px] mx-auto px-10 flex justify-between items-start">
            <div class="w-1/2 space-y-5">
                <div class="space-y-10">
                    <h1 class="text-4xl font-bold">Welcome to Danmobile</h1>
                    <p class="mt-5 text-lg">Buy online. Get in a day.</p>
                </div>
                <div>
                    <a href="" class="mt-5 bg-blue-500 text-white rounded-md px-5 py-2 flex items-center justify-center gap-2">
                        View Products
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                          </svg>  
                    </a>
                </div>
            </div>
            <div class="w-1/2">
                <img src="https://s3.eu-central-1.amazonaws.com/smartyarmenia/images/product_image/33e8a7df045432931101817bb345abcf.jpg" alt="iphone 13" class="w-full">
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-2xl font-bold">Get Started</h2>
            <p class="mt-2">Follow these steps to start using Danmobile:</p>
            <ol class="list-decimal mt-4 ml-6 space-y-2">
            <li>Create an account</li>
            <li>Browse our products</li>
            <li>Add items to your cart</li>
            <li>Proceed to checkout</li>
            <li>Complete your purchase</li>
            </ol>
        </div>
    </div>
@endsection