@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Unit Kerja</h1>

        <a href="{{ route('admin.work-units.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah Unit Kerja
        </a>

        <ul class="mt-4">
            @foreach($units as $unit)
                <li class="border-b py-2">
                    {{ $unit->name }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection

