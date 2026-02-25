@extends('layouts.app')

@section('content')

<div class="grid grid-cols-4 gap-4 mb-6">

    <div class="bg-blue-100 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Semua Dokumen</div>
        <div class="text-2xl font-bold text-blue-700">
            {{ $totalDocuments }}
        </div>
    </div>

    <div class="bg-green-100 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Ratifikasi</div>
        <div class="text-2xl font-bold text-green-700">
            {{ $ratifikasi }}
        </div>
    </div>

    <div class="bg-indigo-100 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Pedoman</div>
        <div class="text-2xl font-bold text-indigo-700">
            {{ $pedoman }}
        </div>
    </div>

    <div class="bg-purple-100 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Prosedur</div>
        <div class="text-2xl font-bold text-purple-700">
            {{ $prosedur }}
        </div>
    </div>

    <div class="bg-yellow-100 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Instruksi</div>
        <div class="text-2xl font-bold text-yellow-700">
            {{ $instruksi }}
        </div>
    </div>

    <div class="bg-red-100 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Formulir</div>
        <div class="text-2xl font-bold text-red-700">
            {{ $formulir }}
        </div>
    </div>

    <div class="bg-gray-100 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Departemen</div>
        <div class="text-2xl font-bold text-gray-700">
            {{ $totalDepartments }}
        </div>
    </div>

    <div class="bg-gray-200 p-4 rounded-xl shadow">
        <div class="text-gray-600 text-sm">Users</div>
        <div class="text-2xl font-bold text-gray-700">
            {{ $totalUsers }}
        </div>
    </div>

</div>
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

        @php
            $currentCategory = request('category', 'all');
        @endphp

        <div class="flex gap-4 mb-4">

            <a href="{{ route('admin.documents.index', ['category' => 'all']) }}"
                class="px-4 py-2 rounded-lg {{ $currentCategory == 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Semua
            </a>

            <a href="{{ route('admin.documents.index', ['category' => 'ratifikasi']) }}"
                class="px-4 py-2 rounded-lg {{ $currentCategory == 'ratifikasi' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Ratifikasi
            </a>

            <a href="{{ route('admin.documents.index', ['category' => 'pedoman']) }}"
                class="px-4 py-2 rounded-lg {{ $currentCategory == 'pedoman' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Pedoman
            </a>

            <a href="{{ route('admin.documents.index', ['category' => 'prosedur']) }}"
                class="px-4 py-2 rounded-lg {{ $currentCategory == 'prosedur' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Prosedur
            </a>

            <a href="{{ route('admin.documents.index', ['category' => 'instruksi-kerja']) }}"
                class="px-4 py-2 rounded-lg {{ $currentCategory == 'instruksi-kerja' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Instruksi Kerja
            </a>

            <a href="{{ route('admin.documents.index', ['category' => 'formulir']) }}"
                class="px-4 py-2 rounded-lg {{ $currentCategory == 'formulir' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Formulir
            </a>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto bg-white shadow rounded-xl">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-sm uppercase text-gray-600">
                        <th class="p-3">Action</th>
                        <th class="p-3">Nomor</th>
                        <th class="p-3">Nama Dokumen</th>
                        <th class="p-3">Revisi</th>
                        <th class="p-3">Unit Kerja</th>
                        <th class="p-3">Keterangan</th>
                        <th class="p-3">Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($documents as $doc)
                        <tr class="border-b hover:bg-gray-50">

                            <!-- ACTION -->
                            <td class="p-3 flex gap-2">

                                @if ($doc->file_document)
                                    <a href="{{ asset($doc->file_document) }}"
                                        class="bg-green-500 text-white px-2 py-1 rounded text-xs">
                                        ⬇
                                    </a>
                                @endif

                                <a href="{{ route('admin.documents.edit', $doc->id) }}"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">
                                    ✏
                                </a>

                                <form action="{{ route('admin.documents.destroy', $doc->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus dokumen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                        🗑
                                    </button>
                                </form>

                            </td>

                            <!-- NOMOR -->
                            <td class="p-3">{{ $doc->document_number }}</td>

                            <!-- NAMA DOKUMEN -->
                            <td class="p-3 font-semibold">
                                {{ $doc->title }}
                            </td>

                            <!-- REVISI -->
                            <td class="p-3">{{ $doc->revision ?? 0 }}</td>

                            <!-- UNIT KERJA -->
                            <td class="p-3">
                                {{ $doc->department->name ?? '-' }}
                            </td>

                            <!-- KETERANGAN -->
                            <td class="p-3">
                                {{ $doc->description ?? '-' }}
                            </td>

                            <!-- TANGGAL -->
                            <td class="p-3">
                                {{ \Carbon\Carbon::parse($doc->document_date)->format('d-m-Y') }}
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-5 text-gray-400">
                                Tidak ada dokumen
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
