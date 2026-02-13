@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 px-6 py-5">
            <h2 class="text-white text-lg font-semibold">
                Edit Department
            </h2>
            <p class="text-indigo-100 text-xs">
                Perbarui data department
            </p>
        </div>

        {{-- Body --}}
        <div class="p-6">

            <form action="{{ route('admin.department.update',$department->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-5">

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Department
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name',$department->name) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                               required>

                        @error('name')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status
                        </label>

                        <div class="flex gap-6">

                            <label class="flex items-center gap-2">
                                <input type="radio"
                                       name="is_active"
                                       value="1"
                                       {{ $department->is_active ? 'checked' : '' }}>
                                <span class="text-sm">Aktif</span>
                            </label>

                            <label class="flex items-center gap-2">
                                <input type="radio"
                                       name="is_active"
                                       value="0"
                                       {{ !$department->is_active ? 'checked' : '' }}>
                                <span class="text-sm">Tidak Aktif</span>
                            </label>

                        </div>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="mt-8 flex justify-between border-t pt-4">

                    <a href="{{ route('admin.department.index') }}"
                       class="px-5 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="px-6 py-2 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition">
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
