<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center ">
        <div class="grid md:grid-cols-2 w-full max-w-4xl shadow-2xl rounded-2xl overflow-hidden">

            <!-- Kiri: Logo / Ilustrasi -->
            <div class="hidden md:flex items-center justify-center bg-indigo-100 p-8">
                <img src="{{ asset('images/smti.png') }}" alt="SMPIM Logo" class="max-w-sm drop-shadow-md" />
            </div>

            <!-- Kanan: Form Register -->
            <div class="p-6 md:p-10 flex flex-col justify-center bg-white bg-opacity-90 backdrop-blur-sm">
                <h2 class="text-2xl md:text-3xl font-bold text-indigo-900 mb-5">
                    Create Account
                    <span class="block text-indigo-600 text-lg md:text-xl">Sign up to get started</span>
                </h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-indigo-700" />
                        <x-text-input
                            id="name"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-indigo-700" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Department -->
<div>
    <x-input-label for="department_id" value="Departemen" class="text-indigo-700" />

    <select name="department_id" id="department_id"
        class="mt-1 block w-full border-gray-300 rounded-xl focus:border-indigo-500 focus:ring focus:ring-indigo-300">

        <option value="">-- Pilih Departemen --</option>

        @foreach($departments as $dept)
            <option value="{{ $dept->id }}">
                {{ $dept->name }}
            </option>
        @endforeach
    </select>

    <x-input-error :messages="$errors->get('department_id')" class="mt-1" />
</div>


<!-- No Badge -->
<div>
    <x-input-label for="no_badge" value="No Badge" class="text-indigo-700" />

    <x-text-input
        id="no_badge"
        type="text"
        name="no_badge"
        :value="old('no_badge')"
        class="mt-1 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-300"
    />

    <x-input-error :messages="$errors->get('no_badge')" class="mt-1" />
</div>


                    <!-- Role -->
                    <div>
                        <x-input-label for="role" value="Role" class="text-indigo-700" />
                        <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-xl focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-indigo-700" />
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-indigo-700" />
                        <x-text-input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="mt-1 block w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Submit & Login Link -->
                    <div class="flex items-center justify-between mt-3">
                        <a href="{{ route('login') }}"
                           class="text-sm text-indigo-600 hover:text-indigo-900 underline transition-colors">
                            Already registered?
                        </a>

                        <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 rounded-xl transition-all">
                            Register
                        </x-primary-button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
