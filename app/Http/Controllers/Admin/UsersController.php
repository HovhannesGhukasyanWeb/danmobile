<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search', null);
        $users = User::query()
            ->orderBy('created_at', 'desc')
            ->when($search, function ($query, $search) {
                return $query->where('username', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            })
            ->paginate(10)
            ->appends(request()->query());

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::findOrFail($id)->delete();
            return response()->json(['message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User deleted successfully'], 500);
        }
    }
}
