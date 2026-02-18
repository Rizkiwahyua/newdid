@extends('layouts.app')

@section('content')
<div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
    <h2 class="font-semibold text-lg">Data Dokumen</h2>
</div>

<div class="bg-white rounded-b-xl shadow border border-gray-100 p-5">
    <div class="flex justify-end mb-4">

     <a href="{{ route('admin.documents.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">
        Tambah Dokumen
    </a>
</div>

<div class="bg-white rounded-b-xl shadow border border-gray-100 p-5">
    <div class="flex justify-between items-center mb-4">

        <div class="text-sm text-gray-600">
            Show
            <select class="border border-gray-300 rounded px-2 py-1 text-sm mx-1">
                <option>0</option>
                <option>10</option>
                <option>20</option>
            </select>
            entries
        </div>

        <!-- search -->
        <div class="flex border border-gray-300 rounded-lg overflow-hidden">
            <input
                type="text"
                placeholder="Search..."
                class="px-3 py-1 text-sm focus:outline-none">
            <button class="px-3 bg-indigo-500 text-white text-sm">
                Cari
            </button>
        </div>

    </div>

    <!-- ================= TABLE ================= -->
    <div class="overflow-x-auto">
    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Judul</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Kode</th>
                <th class="border p-2">Departemen</th>
                <th class="border p-2">Nomor Dokumen</th>
                <th class="border p-2">Revisi</th>
                <th class="border p-2">File</th>
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
                    <td class="border p-2">{{ $doc->department->name }}</td>
                    <td class="border p-2">{{ $doc->document_number }}</td>
                    <td class="border p-2">{{ $doc->revision }}</td>
                    <td class="border p-2">Kosong</td>
                    <td class="border p-2">{{ $doc->document_date }}</td>
                    <td class="border p-2">{{ $doc->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
