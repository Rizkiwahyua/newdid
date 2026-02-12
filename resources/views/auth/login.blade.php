<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center">
        <div class="grid md:grid-cols-2 w-full max-w-4xl shadow-2xl rounded-2xl overflow-hidden bg-gray-100">

            <!-- Kiri: Logo / Ilustrasi -->
            <div class="hidden md:flex items-center justify-center bg-indigo-100 p-10">
                <img src="{{ asset('images/smti.png') }}" alt="SMPIM Logo" class="max-w-xs" />
            </div>

            <!-- Kanan: Form -->
            <div class="p-8 md:p-10 flex flex-col justify-center">
                <h2 class="text-2xl md:text-3xl font-bold text-indigo-900 mb-6">
                    Selamat Datang
                    <span class="block text-indigo-600 text-lg md:text-xl">Please log in to your account</span>
                </h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-indigo-700" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-indigo-700" />
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <!-- Submit & Forgot Password -->
                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-indigo-600 hover:text-indigo-900 underline transition-colors">
                                Forgot your password?
                            </a>
                        @endif

                        <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 rounded-xl transition-all">
                            Log in
                        </x-primary-button>
                    </div>
                </form>

                <!-- Optional Sign Up -->
                <p class="mt-6 text-center text-sm text-gray-500">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900 underline">Sign up</a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>
