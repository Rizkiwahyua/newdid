@extends('layouts.app')

@section('title', 'Data Departemen')

@section('content')




<div class="max-w-6xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-indigo-600 text-white px-6 py-4 rounded-t-xl">
        <h2 class="font-semibold text-lg">Data Departemen</h2>
    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-b-xl shadow border border-gray-100 p-6">

        {{-- TOP BAR --}}
        <div class="mb-6 space-y-4">

    {{-- Row 1 --}}
    <div class="flex justify-between items-center">

        <div class="text-sm text-gray-600">
            Show
            <select class="border border-gray-300 rounded px-2 py-1 text-sm mx-1">
                <option>10</option>
                <option>20</option>
            </select>
            entries
        </div>

        <a href="{{ route('admin.department.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 shadow hover:shadow-md transition">
            Tambah Departemen
        </a>

    </div>

    {{-- Row 2 --}}
    <div class="flex justify-end">
        <div class="flex border border-gray-300 rounded-lg overflow-hidden w-64">
            <input type="text"
                   id="searchInput"
                   placeholder="Search..."
                   class="px-3 py-2 text-sm focus:outline-none w-full">
            <button class="px-4 bg-indigo-500 text-white text-sm">
                Cari
            </button>
        </div>


        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm border-collapse">

                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">

                @forelse($departments as $dept)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="px-4 py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $dept->name }}
                    </td>

                    <td class="px-4 py-3">
                        @if($dept->is_active)
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                Aktif
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                Tidak Aktif
                            </span>
                        @endif
                    </td>

                    <td class="px-4 py-3">
                        <div class="flex gap-2">

                            <a href="{{ route('admin.department.show',$dept->id) }}"
                               class="bg-green-500 text-white px-2 py-1 rounded text-xs hover:bg-green-600">
                                <i class="bi bi-eye-fill"></i>
                            </a>

                            <a href="{{ route('admin.department.edit',$dept->id) }}"
                               class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button type="button"
                                    onclick="confirmDelete({{ $dept->id }})"
                                    class="bg-red-500 text-white px-2 py-1 rounded text-xs hover:bg-red-600">
                                <i class="bi bi-trash-fill"></i>
                            </button>

                            <form id="delete-form-{{ $dept->id }}"
                                  action="{{ route('admin.department.destroy',$dept->id) }}"
                                  method="POST"
                                  class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-400">
                        Tidak ada data
                    </td>
                </tr>
                @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>




<!-- ================= STYLE FILTER ================= -->
<style>
.filter-btn{
    padding:6px 14px;
    border-radius:10px;
    transition:.2s;
}
.filter-btn:hover{
    background:#f3f4f6;
}
.filter-btn.active{
    background:#6366f1;
    color:white;
}
</style>

<script>
const buttons = document.querySelectorAll('.filter-btn');
const rows = document.querySelectorAll('.doc-row');
const searchInput = document.getElementById('searchInput');

let activeFilter = 'all';

buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        activeFilter = btn.dataset.filter;
        filterTable();
    });
});

searchInput.addEventListener('keyup', filterTable);

function filterTable(){
    const keyword = searchInput.value.toLowerCase();

    rows.forEach(row => {
        const matchCategory = activeFilter === 'all' || row.dataset.category === activeFilter;
        const matchSearch = row.innerText.toLowerCase().includes(keyword);

        row.style.display = (matchCategory && matchSearch) ? '' : 'none';
    });
}
</script>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin ingin hapus?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>

@endsection
