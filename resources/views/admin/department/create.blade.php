@extends('layouts.app')

@section('title', 'Tambah Department')

@section('content')

{{-- HEADER --}}
<div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
    <h2 class="font-semibold text-lg">Tambah Department</h2>
</div>

{{-- CARD --}}
<div class="bg-white rounded-b-xl shadow border border-gray-100 p-6">

    <form action="{{ route('admin.department.store') }}" method="POST">
        @csrf

        <div class="space-y-5">

            {{-- Nama Department --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Department
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Masukkan nama department"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                       required>

                @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Status
                </label>

                <div class="flex gap-6">

                    <label class="flex items-center gap-2 text-sm">
                        <input type="radio"
                               name="is_active"
                               value="1"
                               {{ old('is_active',1) == 1 ? 'checked' : '' }}>
                        Aktif
                    </label>

                    <label class="flex items-center gap-2 text-sm">
                        <input type="radio"
                               name="is_active"
                               value="0"
                               {{ old('is_active') == 0 ? 'checked' : '' }}>
                        Tidak Aktif
                    </label>

                </div>
            </div>

        </div>

        {{-- Footer --}}
        <div class="flex justify-between mt-8 border-t pt-4">

            <a href="{{ route('admin.department.index') }}"
               class="px-5 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300 transition">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition shadow">
                Simpan
            </button>

        </div>

    </form>

</div>

@endsection
