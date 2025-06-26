<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('adminuser.index', compact('users'));
    }

    public function create()
    {
        return view('adminuser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('adminuser.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $adminuser)
    {
        return view('adminuser.show', ['user' => $adminuser]);
    }

    public function edit(User $adminuser)
    {
        return view('adminuser.edit', ['user' => $adminuser]);
    }

    public function update(Request $request, User $adminuser)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $adminuser->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $adminuser->name = $request->name;
        $adminuser->email = $request->email;

        if ($request->password) {
            $adminuser->password = Hash::make($request->password);
        }

        $adminuser->save();

        return redirect()->route('adminuser.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy(User $adminuser)
    {
        $adminuser->delete();

        return redirect()->route('adminuser.index')->with('success', 'User berhasil dihapus.');
    }
}
