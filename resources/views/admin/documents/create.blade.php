@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5">
            <h2 class="text-white text-xl font-semibold">
                Tambah User
            </h2>
            <p class="text-indigo-100 text-sm">
                Form pembuatan Dokument baru
            </p>
        </div>

        {{-- Body --}}
        <div class="p-8">
        <form method="POST" action="{{ route('admin.documents.store') }}">
            @csrf

            <div class="mb-3">
                <label>Judul Dokumen</label>
                <input type="text" name="title" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="document_category_id" class="w-full border px-3 py-2">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Kode Dokumen</label>
                <select name="document_code_id" class="w-full border px-3 py-2">
                    @foreach ($codes as $code)
                        <option value="{{ $code->id }}">{{ $code->code }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Departemen</label>
                <select name="department_id" class="w-full border px-3 py-2">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nomor Dokumen</label>
                <input type="text" name="document_number" class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Revisi</label>
                <input type="text" name="revision" class="w-full border px-3 py-2">
            </div>
               <div class="mb-3">
                <label>File</label>
                <input type="file" name="file_document" class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="document_date" class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="description" class="w-full border px-3 py-2"></textarea>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Simpan Dokumen
            </button>
        </form>
    </div>
@endsection
