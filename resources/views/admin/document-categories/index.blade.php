@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Kategori Dokumen</h1>

        {{-- <a href="{{ route('admin.document-categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah Kategori
        </a> --}}

        <ul class="mt-4">
            @foreach ($categories as $category)
                <li class="border-b py-2">
                    {{ $category->name }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
