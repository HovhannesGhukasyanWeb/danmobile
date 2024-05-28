@extends('user.layout')

@section('content')
<div>
    <h1 class="text-center text-2xl font-bold my-4">Card Details</h1>
    <div class="flex justify-center flex-col items-center gap-2">
        <div class="w-1/2">
            <div class="border border-lightgray rounded-lg p-2">
                @if($errors->any())
                    <div class="bg-red-100 text-red-500 p-2 rounded-lg">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('user.cards.store')}}" class="mt-2">
                    @csrf
                    <div class="mt-2">
                        <input type="text" placeholder="Card Number" name="card_number"
                            class="w-full items-center p-2 bg-gray-200 border border-lightgray rounded-lg">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Card Holder Name" name="card_holder_name"
                            class="w-full items-center p-2 bg-gray-200 border border-lightgray rounded-lg">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Card Expiry Date" name="expiry_date"
                            class="w-full items-center p-2 bg-gray-200 border border-lightgray rounded-lg">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="CVV" name="cvv"
                            class="w-full items-center p-2 bg-gray-200 border border-lightgray rounded-lg">
                    </div>

                    <div class="mt-2">
                        <button type="submit"
                            class="w-full gap-2 py-2 flex items-center justify-center rounded-lg text-white bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                            </svg>

                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="flex justify-center flex-col items-center gap-2">
        <div class="w-1/2">
            @php
                $cards = auth()->guard('user')->user()->cards;
            @endphp

            <h4 class="py-2 text-2xl font-bold text-center">Cards</h4>
            @foreach($cards as $card)
                <div class="p-2">
                    <div class="flex gap-2 p-2 border border-lightgray">
                        <div class="flex justify-between w-full items-center">
                            <div class="flex items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                    </svg>
                                </div>
                                <div class="text-lg font-bold">{{ $card->card_number }}</div>
                                <div class="flex gap-2">
                                    <div>{{ $card->card_holder_name }}</div>
                                    <div>{{ $card->expiry_date }}</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form method="post" action="{{ route('user.cards.destroy', $card->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @if($cards->count() == 0)
                <div class="text-center text-gray-500">No cards found</div>
            @endif
        </div>
    </div>
</div>
@endsection