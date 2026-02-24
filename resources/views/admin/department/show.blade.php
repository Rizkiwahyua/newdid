@extends('layouts.app')

@section('content')
    <div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
        <h2 class="font-semibold text-lg">
            Dokumen Departemen: {{ $department->name }}
        </h2>
    </div>

    <div class="bg-white p-5 shadow rounded-b-xl">

        <p class="mb-4">
            Total Dokumen:
            <span class="font-bold">
                {{ $department->documents->count() }}
            </span>
        </p>

        <div class="overflow-x-auto">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Judul</th>
                        <th class="border p-2">Kategori</th>
                        <th class="border p-2">Departemen</th>
                        <th class="border p-2">Nomor Dokumen</th>
                        <th class="border p-2">Revisi</th>
                        <th class="border p-2">Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($department->documents as $doc)
                        <tr>
                            <td class="border p-2">{{ $doc->title }}</td>
                            <td class="border p-2">{{ $doc->category->name ?? '-' }}</td>
                            <td class="border p-2">{{ $doc->department->name ?? '-' }}</td>
                            <td class="border p-2">{{ $doc->document_number }}</td>
                            <td class="border p-2">{{ $doc->revision }}</td>
                            <td class="border p-2">{{ $doc->document_date }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center p-4 text-gray-500">
                                Tidak ada dokumen
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
