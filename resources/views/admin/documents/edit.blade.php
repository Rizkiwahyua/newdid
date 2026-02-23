@extends('layouts.app')

@section('content')
<div class="max-w-xl">
    <h1 class="text-xl font-bold mb-4">Edit Dokumen</h1>

    <form method="POST" action="{{ route('admin.documents.update', $document->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul Dokumen</label>
            <input type="text" name="title"
                   value="{{ $document->title }}"
                   class="w-full border px-3 py-2" required>
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
            <select name="department" class="w-full border px-3 py-2">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $document->departments == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nomor Dokumen</label>
            <input type="text" name="document_number"
                   value="{{ $document->document_number }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-3">
            <label>Revisi</label>
            <input type="text" name="revision"
                   value="{{ $document->revision }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="document_date"
                   value="{{ $document->document_date }}"
                   class="w-full border px-3 py-2">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="description"
                      class="w-full border px-3 py-2">{{ $document->description }}</textarea>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Dokumen
        </button>
    </form>
</div>
@endsection