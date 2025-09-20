@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 animate-on-scroll">
                <div class="text-center">
                    <div class="mx-auto h-16 w-16 rounded-full bg-green-600 flex items-center justify-center mb-4">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        Create an account
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Fill in the information below to get started
                    </p>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-900 p-4">
                        <div class="text-sm text-red-800 dark:text-red-200">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>

                        <ul class="mt-3 list-disc list-inside text-sm text-red-700 dark:text-red-300">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="mt-8 space-y-6" method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="rounded-md space-y-4">
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                            <input id="name" name="name" type="text" required
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700"
                                placeholder="Full Name" value="{{ old('name') }}">
                        </div>

                        <div>
                            <label for="email-address"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                                address</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700"
                                placeholder="Email address" value="{{ old('email') }}">
                        </div>

                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700"
                                placeholder="Password">
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm
                                Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                autocomplete="new-password" required
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700"
                                placeholder="Confirm Password">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-300 transform hover:scale-[1.02]">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-user-plus h-5 w-5 text-green-500 group-hover:text-green-400"></i>
                            </span>
                            Register
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        <a href="{{ route('login') }}"
                            class="font-medium text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
