@extends('user.layout')

@section('content')
<div>
    <h1 class="text-center text-2xl font-bold my-4">Me</h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <div class="border border-lightgray rounded-lg p-2">

                <form method="post" action="/update-profile" class="mt-2">
                    @csrf
                    <h1 class="text-center font-bold text-lg">{{ $user->username }}</h1>
                    <div class="mt-2">
                        <input type="text" placeholder="Email" disabled value="{{$user->email}}"
                            class="w-full items-center p-2 bg-gray-200 border border-lightgray rounded-lg">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Phone Number" name="phone_number"
                            value="{{$user->phone_number}}"
                            class="w-full items-center p-2 bg-gray-200 border border-lightgray rounded-lg">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Address" name="address" value="{{$user->address}}"
                            class="w-full items-center p-2 bg-gray-200 border border-lightgray rounded-lg">
                    </div>
                    <div class="mt-2">
                        <button type="submit"
                            class="w-full py-2 flex items-center justify-center rounded-lg text-white bg-blue-500">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-1/2 mt-2">
            <a href="{{ route('user.cards.index') }}"
                class="w-full py-2 flex items-center justify-center rounded-lg text-white bg-blue-500 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>

                Cards
            </a>
        </div>
    </div>
</div>
@endsection