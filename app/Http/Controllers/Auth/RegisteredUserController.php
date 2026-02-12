<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Department;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
   
    /**
     * Handle an incoming registration request.
     */

    public function create(): View
{
    $departments = Department::orderBy('name')->get();

    return view('auth.register', compact('departments'));
}

    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],

        // ✅ tambahan baru
        'department_id' => ['nullable', 'exists:departments,id'],
        'no_badge' => ['nullable', 'string', 'max:50', 'unique:users,no_badge'],
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),

        'role' => $request->role ?? 'user',

        // ✅ simpan data baru
        'department_id' => $validated['department_id'] ?? null,
        'no_badge' => $validated['no_badge'] ?? null,
    ]);

    return redirect('/')
        ->with('success', 'Registrasi berhasil, silakan login');
}

}
