<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen flex bg-gray-100">
         <!-- Sidebar -->
       <aside class="w-64 bg-indigo-700 shadow-md min-h-screen flex flex-col overflow-y-auto">

    <!-- ================= PROFILE USER ================= -->
    <div class="p-6 border-b border-indigo-600 flex flex-col items-center">

        <!-- FOTO -->
       <img
    src="{{ auth()->user()->photo
            ? asset('images/'.auth()->user()->photo)
            : asset('images/profile.png') }}"
    class="w-16 h-16 rounded-full object-cover border-4 border-white shadow"
/>


        <!-- NAMA -->
        <p class="mt-3 text-white font-semibold text-sm text-center">
            {{ auth()->user()->name }}
        </p>

        <!-- BADGE ROLE -->
        <span class="mt-1 text-xs bg-indigo-500 text-white px-3 py-1 rounded-full">
            {{ ucfirst(auth()->user()->role) }}
        </span>

    </div>

            @if(auth()->user()->role === 'admin')
                @include('admin.sidebar')
            @elseif(auth()->user()->role === 'user')
                @include('user.sidebar')
            @endif
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    confirmButtonColor: '#6366f1'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: '{{ session('error') }}',
    confirmButtonColor: '#6366f1'
});
</script>
@endif

@if ($errors->any())
<script>
Swal.fire({
    icon: 'warning',
    title: 'Oops...',
    text: 'Periksa kembali input Anda!',
    confirmButtonColor: '#6366f1'
});
</script>
@endif

</body>
