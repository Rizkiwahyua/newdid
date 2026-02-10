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
        <aside class="w-50 bg-indigo-700 shadow-md min-h-screen flex flex-col overflow-y-auto">
            <div class="p-6 border-b border-indigo-600">
        <h1 class="text-xl font-bold text-white">Admin Panel</h1>
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
</body>
