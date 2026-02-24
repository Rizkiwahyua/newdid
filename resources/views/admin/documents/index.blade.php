@extends('layouts.app')

@section('content')
    <div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
        <h2 class="font-semibold text-lg">Data Dokumen</h2>
    </div>

    <div class="bg-white rounded-b-xl shadow border border-gray-100 p-5">

        <!-- Tombol Tambah -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.documents.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Dokumen
            </a>
        </div>

        <!-- Show + Search -->
        <div class="flex justify-between items-center mb-4">

            <div class="text-sm text-gray-600">
                Show
                <select class="border border-gray-300 rounded px-2 py-1 text-sm mx-1">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select>
                entries
            </div>

            <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                <input type="text" placeholder="Search..." class="px-3 py-1 text-sm focus:outline-none">
                <button class="px-3 bg-indigo-500 text-white text-sm">
                    Cari
                </button>
            </div>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Aksi</th>
                        <th class="border p-2">Judul</th>
                        <th class="border p-2">Kategori</th>
                        <th class="border p-2">Kode</th>
                        <th class="border p-2">Departemen</th>
                        <th class="border p-2">Nomor Dokumen</th>
                        <th class="border p-2">Revisi</th>
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($documents as $doc)
                        <tr>
                            <td class="border p-2">
                                <a href="{{ route('admin.documents.edit', $doc->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                    ✏
                                </a>
                                <form action="{{ route('admin.documents.destroy', $doc->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                        🗑
                                    </button>
                                </form>
                                @if ($doc->file_document)
                                    <a href="{{ asset($doc->file_document) }}" target="_blank"
                                        class="bg-green-500 text-white px-3 py-1 rounded text-sm">
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-gray-400 text-sm">
                                        Tidak Ada File
                                    </span>
                                @endif
                            </td>

                            <td class="border p-2">{{ $doc->title }}</td>
                            <td class="border p-2">{{ $doc->category->name ?? '-' }}</td>
                            <td class="border p-2">{{ $doc->code->code ?? '-' }}</td>
                            <td class="border p-2">{{ $doc->department->name ?? '-' }}</td>
                            <td class="border p-2">{{ $doc->document_number }}</td>
                            <td class="border p-2">{{ $doc->revision }}</td>

                            <td class="border p-2">{{ $doc->document_date }}</td>
                            <td class="border p-2">{{ $doc->description }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center p-4 text-gray-500">
                                Tidak ada data dokumen
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
