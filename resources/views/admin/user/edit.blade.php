@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-lg font-semibold mb-6">Edit User</h2>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-5">

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Nama Lengkap
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       placeholder="Masukkan nama lengkap"
                       class="border p-2 rounded w-full focus:ring-2 focus:ring-indigo-400"
                       required>
            </div>

            {{-- No Badge --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    No Badge
                </label>
                <input type="text"
                       name="badge_number"
                       value="{{ old('badge_number', $user->no_badge) }}"
                       placeholder="Masukkan nomor badge"
                       class="border p-2 rounded w-full focus:ring-2 focus:ring-indigo-400">
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Email
                </label>
                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       placeholder="Masukkan email aktif"
                       class="border p-2 rounded w-full focus:ring-2 focus:ring-indigo-400"
                       required>
            </div>

            {{-- Department --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Department
                </label>

                @if($user->department_id)

                    <input type="text"
                           value="{{ $user->department->name ?? '-' }}"
                           class="border p-2 rounded w-full bg-gray-100"
                           readonly>

                @else

                    <select name="department_id"
                            class="border p-2 rounded w-full focus:ring-2 focus:ring-indigo-400">

                        <option value="">-- Pilih Department --</option>

                        @foreach($departments as $dept)
                        <option value="{{ $dept->id }}"
                            {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                        @endforeach

                    </select>

                @endif
            </div>

            {{-- Role --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Role
                </label>
                <select name="role"
                        class="border p-2 rounded w-full focus:ring-2 focus:ring-indigo-400">
                    <option value="user" {{ $user->role=='user'?'selected':'' }}>
                        User
                    </option>
                    <option value="admin" {{ $user->role=='admin'?'selected':'' }}>
                        Admin
                    </option>
                </select>
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Password
                </label>
                <input type="password"
                       name="password"
                       placeholder="Kosongkan jika tidak ingin diganti"
                       class="border p-2 rounded w-full focus:ring-2 focus:ring-indigo-400">
            </div>

        </div>

        <button class="mt-6 bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
            Update
        </button>

    </form>

</div>

@endsection
