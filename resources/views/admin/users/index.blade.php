@extends('admin.layout')

@section('title', 'Users')

@section('content')
<div class="w-full px-2">
    <div class="flex items-center w-full justify-between my-4">
        <h1 class="text-2xl font-semibold text-gray-700">Users</h1>
    </div>
    <div class="flex items-center justify-end">
        <form action="{{ route('admin.users.index') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search" value="{{ request()->query('search') }}"
                    class="border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">Search</button>
            </div>
        </form>
    </div>

    <div>
        <table class="w-full mt-4 datatable">
            <thead>
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Username</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="p-2">{{$user->id}}</td>
                        <td class="p-2">{{$user->username}}</td>
                        <td class="p-2">{{$user->email}}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.users.destroy', $user->id) }}"
                                    class="remove-resource bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('admin.users.show', $user->id) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="w-full flex items-center justify-center p-2">
                                <p class="text-gray-500">No users found</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="py-2">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection