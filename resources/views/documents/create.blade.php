<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Tambah Dokumen</h1>

        <form method="POST" action="{{ route('documents.store') }}">
            @csrf

            <div class="mb-3">
                <label>Judul Dokumen</label>
                <input type="text" name="title" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="document_category_id" class="w-full border px-3 py-2">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Kode Dokumen</label>
                <select name="document_code_id" class="w-full border px-3 py-2">
                    @foreach ($codes as $code)
                        <option value="{{ $code->id }}">{{ $code->code }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Unit Kerja</label>
                <select name="work_unit_id" class="w-full border px-3 py-2">
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nomor Dokumen</label>
                <input type="text" name="document_number" class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Revisi</label>
                <input type="text" name="revision" class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="document_date" class="w-full border px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="description" class="w-full border px-3 py-2"></textarea>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Simpan Dokumen
            </button>
        </form>
    </div>
</x-app-layout>
