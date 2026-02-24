<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'no_badge' => 'nullable|unique:users,no_badge',
            'department_name' => 'nullable|string|max:255',
            'role' => 'required|in:admin,user',
            'password' => 'required|min:6',
        ]);

        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'department_name' => $request->department_name,
                'no_badge' => $request->no_badge,
                'role' => $request->role,
            ]);

            return redirect()
                ->route('admin.user.index')
                ->with('success', 'User berhasil ditambahkan');
        } catch (QueryException $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_badge' => 'nullable|unique:users,no_badge,' . $user->id,
            'department_name' => 'nullable|string|max:255',
            'role' => 'required|in:admin,user',
            'password' => 'nullable|min:6',
        ]);

        try {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_badge' => $request->no_badge,
                'department_name' => $request->department_name,
                'role' => $request->role,
            ]);

            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return redirect()
                ->route('admin.user.index')
                ->with('success', 'User berhasil diupdate');
        } catch (QueryException $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mengupdate data');
        }
    }

    public function destroy(User $user)
    {
        try {

            $user->delete();

            return redirect()
                ->route('admin.user.index')
                ->with('success', 'User berhasil dihapus');
        } catch (QueryException $e) {

            return redirect()
                ->back()
                ->with('error', 'Data gagal dihapus');
        }
    }
}
