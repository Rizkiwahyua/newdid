<header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold">
        @isset($title)
            {{ $title }}
        @else
            Dashboard
        @endisset
    </h1>
    <div>
        <span class="mr-4">Halo, {{ auth()->user()->name }}</span>
        <form method="POST" action="" class="inline">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>
</header>
