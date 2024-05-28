@extends('user.layout')

@section('content')
<div class="flex justify-center">
    <div class="max-w-[500px] w-[500px] mt-4">
        <div class="border border-gray-300 p-2 rounded-lg">
            <div class="py-2">
                <h4 class="text-center text-2xl font-bold">Create an account</h4>
            </div>
            <div class="border-b border-lightgray"></div>
            <div class="py-2">
                <form class="space-y-4" method="post" action="/register">
                    @csrf
                    @if($errors->any())
                        <div class="bg-red-100 text-red-500 p-2 rounded-lg">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="py-2">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"
                            class="w-full p-2 border border-lightgray rounded-lg focus:ring-blue-500 focus:ring focus:outline-blue-500">
                    </div>
                    <div class="py-2">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email"
                            class="w-full p-2 border border-lightgray rounded-lg focus:ring-blue-500 focus:ring focus:outline-blue-500">
                    </div>
                    <div class="py-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full p-2 border border-lightgray rounded-lg focus:ring-blue-500 focus:ring focus:outline-blue-500">
                    </div>
                    <div class="py-2">
                        <button type="submit"
                            class="py-2 rounded-md w-full text-white bg-blue-500 flex justify-center items-center">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection