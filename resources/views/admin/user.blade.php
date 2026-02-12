@extends('layouts.app')

@section('title', 'User Admin')

@section('content')

<div class="bg-indigo-600 text-white px-6 py-3 rounded-t-xl">
    <h2 class="font-semibold text-lg">Data User</h2>
</div>

<div class="bg-white rounded-b-xl shadow border border-gray-100 p-5">
<div class="bg-white rounded-b-xl shadow border border-gray-100 p-5">
    <div class="flex justify-between items-center mb-4">

        <div class="text-sm text-gray-600">
            Show
            <select class="border border-gray-300 rounded px-2 py-1 text-sm mx-1">
                <option>0</option>
                <option>10</option>
                <option>20</option>
            </select>
            entries
        </div>

        <!-- search -->
        <div class="flex border border-gray-300 rounded-lg overflow-hidden">
            <input
                type="text"
                placeholder="Search..."
                class="px-3 py-1 text-sm focus:outline-none"
            >
            <button class="px-3 bg-indigo-500 text-white text-sm">
                Cari
            </button>
        </div>

    </div>

    <!-- ================= TABLE ================= -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">No Badge</th>
                    <th class="px-4 py-3">email</th>
                    <th class="px-4 py-3">Departement</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <!-- PEDOMAN -->
                <tr class="doc-row hover:bg-gray-50" data-category="pedoman">

                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3 font-medium"></td>
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3 flex gap-2">
                <button class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></button>
                <button class="btn btn-sm btn-warning "><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>

            </tbody>

        </table>
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


@endsection
