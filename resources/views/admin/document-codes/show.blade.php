@extends('layouts.app')

@section('content')

<div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
    <h2 class="font-semibold text-lg">
        Dokumen dengan Kode: {{ $document_code->code }}
    </h2>
</div>

<div class="bg-white rounded-b-xl shadow border border-gray-100 p-5">

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
                @forelse ($documents as $doc)
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
                        <td colspan="5" class="text-center p-4 text-gray-500">
                            Belum ada dokumen dengan kode ini
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection