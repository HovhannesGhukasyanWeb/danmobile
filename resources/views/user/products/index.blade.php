@extends('user.layout')
@section('content')
    <div class="mt-5 flex justify-center items-center">
        <div class="max-w-[1000px] w-[1000px]"> 
            <h1 class="text-center text-2xl">Products</h1>

            <div class="mt-3 w-full">
                <div class="grid grid-cols-3 w-full gap-3">
                    @foreach ($products as $product)
                        @include('user.products.card', [
                            'product' => $product
                        ])                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection