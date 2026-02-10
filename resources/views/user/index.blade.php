@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-3 gap-6 mb-6">
    <div class="bg-white shadow rounded p-4">
        <h2 class="font-bold mb-2">Jumlah User</h2>
        <p class="text-2xl">120</p>
    </div>
    <div class="bg-white shadow rounded p-4">
        <h2 class="font-bold mb-2">Jumlah Cuti</h2>
        <p class="text-2xl">45</p>
    </div>
    <div class="bg-white shadow rounded p-4">
        <h2 class="font-bold mb-2">Aktivitas Terbaru</h2>
        <p class="text-gray-500">Tidak ada data terbaru</p>
    </div>
</div>

<div class="bg-white shadow rounded p-4">
    <h2 class="font-bold mb-4">Daftar User</h2>
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border p-2">1</td>
                <td class="border p-2">Mazaia</td>
                <td class="border p-2">mazaia@mail.com</td>
                <td class="border p-2">Admin</td>
            </tr>
            <tr class="bg-gray-50">
                <td class="border p-2">2</td>
                <td class="border p-2">Budi</td>
                <td class="border p-2">budi@mail.com</td>
                <td class="border p-2">User</td>
            </tr>
            <tr>
                <td class="border p-2">3</td>
                <td class="border p-2">Sari</td>
                <td class="border p-2">sari@mail.com</td>
                <td class="border p-2">User</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
