@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Departemen</h2>

    <a href="{{ route('admin.department.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow">
        + Tambah Departemen
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

@forelse ($departments as $department)

    <div class="bg-white rounded-xl shadow p-6 border hover:shadow-lg transition">

        <h3 class="text-xl font-bold text-indigo-600">
            {{ $department->name }}
        </h3>

        <div class="my-4">
            <span class="text-sm text-gray-600">
                Total Dokumen:
            </span>

            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-semibold">
                {{ $department->documents_count }}
            </span>
        </div>

        <div class="flex gap-2">

            <a href="{{ route('admin.department.show', $department->id) }}"
               class="flex-1 text-center bg-indigo-500 text-white px-3 py-2 rounded text-sm">
                Show
            </a>

            <a href="{{ route('admin.department.edit', $department->id) }}"
               class="flex-1 text-center bg-yellow-500 text-white px-3 py-2 rounded text-sm">
                Edit
            </a>

            <form action="{{ route('admin.department.destroy', $department->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus departemen ini?')"
                  class="flex-1">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="w-full bg-red-500 text-white px-3 py-2 rounded text-sm">
                    Hapus
                </button>
            </form>

        </div>

    </div>

@empty
    <div class="col-span-full text-center text-gray-500">
        Belum ada departemen
    </div>
@endforelse

</div>

@endsection