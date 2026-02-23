@extends('layouts.app')

@section('content')
    <div class="max-w-xl">
        <h1 class="text-xl font-bold mb-4">Edit Dokumen</h1>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.documents.update', $document->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul Dokumen</label>
                <input type="text" name="title" value="{{ $document->title }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="document_category_id" class="w-full border px-3 py-2">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $document->document_category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Kode Dokumen</label>
                <select name="document_code_id" class="w-full border px-3 py-2">
                    @foreach ($codes as $code)
                        <option value="{{ $code->id }}"
                            {{ $document->document_code_id == $code->id ? 'selected' : '' }}>
                            {{ $code->code }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Departemen</label>
                <select name="department_id" class="w-full border px-3 py-2">
                    @foreach ($departments as $dept)
                        <option value="{{ $dept->id }}" {{ $document->department_id == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nomor Dokumen</label>
                <input type="text" name="document_number" value="{{ $document->document_number }}"
                    class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Revisi</label>
                <input type="text" name="revision" value="{{ $document->revision }}" class="w-full border px-3 py-2">
            </div>


            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="document_date" value="{{ old('document_date', $document->document_date) }}">
            </div>
            <div class="mb-3">
                <label>File Dokumen</label>

                @if ($document->file_document)
                    <div class="mb-2">
                        <a href="{{ asset($document->file_document) }}" target="_blank"
                            class="bg-green-500 text-white px-3 py-1 rounded text-sm">
                            Lihat File Lama
                        </a>
                    </div>
                @endif

                <input type="file" name="file_document" class="w-full border px-3 py-2">
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="description" class="w-full border px-3 py-2">{{ $document->description }}</textarea>
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Update Dokumen
            </button>
        </form>
    </div>
@endsection
