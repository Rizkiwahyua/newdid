@extends('layouts.app')

@section('content')
    <div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
        <h2 class="font-semibold text-lg">
            Preview Dokumen
        </h2>
    </div>

    <div class="bg-white p-6 rounded-b-xl shadow">

        <div class="mb-4">
            <h3 class="text-xl font-bold">
                {{ $document->title }}
            </h3>

            <p class="text-sm text-gray-500">
                Nomor: {{ $document->document_number ?? '-' }}
            </p>
        </div>

        @if ($document->file_document)
            <iframe src="{{ route('admin.documents.stream', $document->id) }}" width="100%" height="800px"
                class="rounded-lg border shadow">
            </iframe>
        @else
            <div class="text-red-500">
                File tidak tersedia.
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('admin.documents.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                ← Kembali
            </a>
        </div>

    </div>
@endsection
