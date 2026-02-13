@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 px-6 py-5">
            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center text-white text-lg font-bold">
                    {{ strtoupper(substr($user->name,0,1)) }}
                </div>

                <div>
                    <h2 class="text-white text-lg font-semibold">
                        {{ $user->name }}
                    </h2>
                    <p class="text-indigo-100 text-xs">
                        Detail Informasi User
                    </p>
                </div>

            </div>
        </div>

        {{-- Body --}}
        <div class="p-6">

            <div class="grid md:grid-cols-2 gap-4">

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">Nama Lengkap</p>
                    <p class="font-semibold text-gray-800">
                        {{ $user->name }}
                    </p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">No Badge</p>
                    <p class="font-semibold text-gray-800">
                        {{ $user->no_badge ?? '-' }}
                    </p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">Email</p>
                    <p class="font-semibold text-gray-800 break-words">
                        {{ $user->email }}
                    </p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">Department</p>
                    <p class="font-semibold text-gray-800">
                        {{ $user->department->name ?? '-' }}
                    </p>
                </div>

            </div>

            {{-- Row Bawah Supaya Tidak Tinggi --}}
            <div class="grid md:grid-cols-3 gap-4 mt-4">

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-xs text-gray-400 mb-2">Role</p>

                    @if($user->role == 'admin')
                        <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-600 rounded-full">
                            Admin
                        </span>
                    @else
                        <span class="px-3 py-1 text-xs font-semibold bg-emerald-100 text-emerald-600 rounded-full">
                            User
                        </span>
                    @endif
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">Dibuat</p>
                    <p class="font-semibold text-gray-800 text-sm">
                        {{ $user->created_at->format('d M Y H:i') }}
                    </p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">Update</p>
                    <p class="font-semibold text-gray-800 text-sm">
                        {{ $user->updated_at->format('d M Y H:i') }}
                    </p>
                </div>

            </div>

            {{-- Footer --}}
            <div class="mt-6 border-t pt-4 text-right">
                <a href="{{ route('admin.user.index') }}"
                   class="inline-flex items-center px-5 py-2 bg-gray-900 text-white text-sm rounded-lg hover:bg-black transition">
                    ← Kembali
                </a>
            </div>

        </div>

    </div>

</div>

@endsection
