@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-xl font-bold mb-4">Daftar Dokumen</h1>

    <a href="{{ route('admin.documents.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">
        + Tambah Dokumen
    </a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Judul</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Kode</th>
                <th class="border p-2">Unit Kerja</th>
                <th class="border p-2">Nomor Dokumen</th>
                <th class="border p-2">Revisi</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $doc)
                <tr>
                    <td class="border p-2">{{ $doc->title }}</td>
                    <td class="border p-2">{{ $doc->category->name }}</td>
                    <td class="border p-2">{{ $doc->code->code }}</td>
                    <td class="border p-2">{{ $doc->workUnit->name }}</td>
                    <td class="border p-2">{{ $doc->document_number }}</td>
                    <td class="border p-2">{{ $doc->revision }}</td>
                    <td class="border p-2">{{ $doc->document_date }}</td>
                    <td class="border p-2">{{ $doc->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
