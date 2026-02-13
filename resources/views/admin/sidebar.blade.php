<nav class="p-6 flex-1 bg-indigo-700">
    <ul class="space-y-3 text-sm font-semibold">

        <!-- Dashboard -->
        <li>

            <a href="{{ route ('admin.dashboard') }}"
               class="group flex items-center gap-4 px-4 py-3 rounded-xl
                      text-indigo-100 hover:bg-indigo-600 hover:text-white transition">
                <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-600 group-hover:bg-white group-hover:text-indigo-700">
                    <i class="bi bi-speedometer2 text-lg"></i>
                </span>
                Dashboard
            </a>
        </li>

        <!-- Dokumen -->
        <li>
            <a href="{{ route('admin.documents.index') }}"
               class="group flex items-center gap-4 px-4 py-3 rounded-xl
                      text-indigo-100 hover:bg-indigo-600 hover:text-white transition">
                <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-600 group-hover:bg-white group-hover:text-indigo-700">
                    <i class="bi bi-folder text-lg"></i>
                </span>
                Dokumen
            </a>
        </li>

        <!-- Kategori -->
        <li>
            <a href="{{ route('admin.document-categories.index') }}"
               class="group flex items-center gap-4 px-4 py-3 rounded-xl
                      text-indigo-100 hover:bg-indigo-600 hover:text-white transition">
                <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-600 group-hover:bg-white group-hover:text-indigo-700">
                    <i class="bi bi-tags text-lg"></i>
                </span>
                Kategori
            </a>
        </li>

        <!-- Kode Dokumen -->
        <li>
            <a href="{{ route('admin.document-codes.index') }}"
               class="group flex items-center gap-4 px-4 py-3 rounded-xl
                      text-indigo-100 hover:bg-indigo-600 hover:text-white transition">
                <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-600 group-hover:bg-white group-hover:text-indigo-700">
                    <i class="bi bi-hash text-lg"></i>
                </span>
                Kode Dokumen
            </a>
        </li>


            <a href="{{ route('admin.work-units.index') }}"

               class="group flex items-center gap-4 px-4 py-3 rounded-xl
                      text-indigo-100 hover:bg-indigo-600 hover:text-white transition">
                <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-600 group-hover:bg-white group-hover:text-indigo-700">
                    <i class="bi bi-hash text-lg"></i>
                </span>
                Unit kerja
            </a>
        </li>

        <!-- User -->
        <li>
            <a href="{{ route ('admin.user.index') }}"
               class="group flex items-center gap-4 px-4 py-3 rounded-xl
                      text-indigo-100 hover:bg-indigo-600 hover:text-white transition">
                <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-indigo-600 group-hover:bg-white group-hover:text-indigo-700">
                    <i class="bi bi-people text-lg"></i>
                </span>
                User
            </a>
        </li>

    </ul>
</nav>
