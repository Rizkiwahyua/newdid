@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5">
            <h2 class="text-white text-xl font-semibold">
                Tambah User
            </h2>
            <p class="text-indigo-100 text-sm">
                Form pembuatan user baru
            </p>
        </div>

        {{-- Body --}}
        <div class="p-8">

            <form action="{{ route('admin.user.store') }}"
                  method="POST"
                  autocomplete="off">
                @csrf

                {{-- dummy anti autofill --}}
                <input type="text" name="fakeusernameremembered" class="hidden">
                <input type="password" name="fakepasswordremembered" class="hidden">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               placeholder="Masukkan nama lengkap"
                               autocomplete="off"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                               required>
                    </div>

                    {{-- No Badge --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            No Badge
                        </label>
                        <input type="text"
                               name="no_badge"
                               placeholder="Masukkan nomor badge"
                               autocomplete="off"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                               name="email"
                               placeholder="Masukkan email user"
                               autocomplete="new-email"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                               required>
                    </div>

                    {{-- Department --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Department
                        </label>
                        <select name="department_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            <option value="">-- Pilih Department --</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}">
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Role --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Role
                        </label>
                        <select name="role"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password"
                               name="password"
                               placeholder="Masukkan password"
                               autocomplete="new-password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                               required>
                    </div>

                </div>

                {{-- Button --}}
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                            class="px-7 py-3 bg-indigo-600 text-white font-semibold rounded-xl shadow-md hover:bg-indigo-700 hover:shadow-lg transition duration-200">
                        Simpan User
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection
