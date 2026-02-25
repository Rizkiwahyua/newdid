@extends('layouts.app')

@section('content')

<div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl mb-6">
    <h2 class="font-semibold text-lg">
        {{ $title }}
    </h2>
</div>

<div class="bg-white p-6 rounded-xl shadow">

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Nomor</th>
                <th class="border p-2">Nama Dokumen</th>
                <th class="border p-2">Revisi</th>
                <th class="border p-2">Unit Kerja</th>
                <th class="border p-2">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @forelse($documents as $doc)
                <tr>
                    <td class="border p-2">{{ $doc->document_number }}</td>
                    <td class="border p-2">{{ $doc->title }}</td>
                    <td class="border p-2">{{ $doc->revision }}</td>
                    <td class="border p-2">{{ $doc->department->name ?? '-' }}</td>
                    <td class="border p-2">{{ $doc->document_date }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-4 text-gray-500">
                        Tidak ada dokumen
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection