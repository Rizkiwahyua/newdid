@extends('layouts.app')

@section('content')
    <div class="p-6 max-w-md">
        <h1 class="text-xl font-bold mb-4">Tambah Unit Kerja</h1>

        <form method="POST" action="{{ route('admin.work-units.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Nama Unit Kerja</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
@endsection
