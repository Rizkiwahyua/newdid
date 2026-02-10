<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Kode Dokumen</h1>

        <a href="{{ route('document-codes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah Kode
        </a>

        <ul class="mt-4">
            @foreach ($codes as $code)
                <li class="border-b py-2">
                    {{ $code->code }} — {{ $code->description }}
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
