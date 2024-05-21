@extends('admin.layout')

@section('title', 'User')

@section('content')
<div class="w-full">
    <div class="flex items-center w-full justify-between my-4">
        <h1 class="text-2xl font-semibold text-gray-700">User {{$user->username}}</h1>
    </div>
    <div class="flex items-center justify-end">
        <a href="{{ route('admin.users.index') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
    </div>
    <div class="mt-4">
        <div class="flex items  center gap-4">
            <div class="w-1/2">
                <div class="space-y-2">
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Username</label>
                        <p class="text-gray-500">{{$user->username}}</p>
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="text-gray-500">{{$user->email}}</p>
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <p class="text-gray-500">{{$user->address}}</p>
                    </div>
                    <div class="w-1/2 flex items-center gap-2">
                        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <p class="text-gray-500">{{$user->phone_number}}</p>
                    </div>


                    <div class="w-full">
                        <div class="p-2">
                            <p class="text-gray-500 text-2xl">Placed orders:</p>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection