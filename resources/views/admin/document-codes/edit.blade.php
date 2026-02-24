@extends('layouts.app')

@section('content')

    <div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
        <h2 class="font-semibold text-lg">Edit Kode Dokumen</h2>
    </div>

    <div class="bg-white rounded-b-xl shadow border border-gray-100 p-5">

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                @foreach ($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.document-codes.update', $document_code->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kode</label>
                <input type="text" name="code" value="{{ old('code', $document_code->code) }}"
                    class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $document_code->name) }}"
                    class="w-full border px-3 py-2">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Update
            </button>

        </form>

    </div>

@endsection
