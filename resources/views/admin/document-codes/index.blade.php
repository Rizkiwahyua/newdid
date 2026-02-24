@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Kode Dokumen</h2>

        <a href="{{ route('admin.document-codes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Kode
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse ($codes as $code)
            <div class="bg-white rounded-xl shadow p-6 border hover:shadow-lg transition">

                <!-- Nama Kode -->
                <h3 class="text-xl font-bold text-indigo-600">
                    {{ $code->code }}
                </h3>

                <p class="text-gray-500 mb-4">
                    {{ $code->name }}
                </p>

                <!-- Jumlah Dokumen -->
                <div class="mb-4">
                    <span class="text-sm text-gray-600">
                        Total Dokumen:
                    </span>

                    <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $code->documents_count }}
                    </span>
                </div>

                <!-- Tombol -->
                <div class="flex gap-2">

                    <a href="{{ route('admin.document-codes.show', $code->id) }}"
                        class="flex-1 text-center bg-indigo-500 text-white px-3 py-2 rounded text-sm">
                        Show
                    </a>

                    <a href="{{ route('admin.document-codes.edit', $code->id) }}"
                        class="flex-1 text-center bg-yellow-500 text-white px-3 py-2 rounded text-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.document-codes.destroy', $code->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus kode ini?')" class="flex-1">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="w-full bg-red-500 text-white px-3 py-2 rounded text-sm">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>

        @empty

            <div class="col-span-full text-center text-gray-500">
                Belum ada kode dokumen
            </div>
        @endforelse

    </div>
@endsection
