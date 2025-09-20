@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 animate-on-scroll">
                <div class="text-center">
                    <div class="mx-auto h-16 w-16 rounded-full bg-blue-600 flex items-center justify-center mb-4">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        Welcome back
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Sign in to your account to continue
                    </p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 rounded-lg bg-green-50 dark:bg-green-900 p-4">
                        <div class="text-sm text-green-800 dark:text-green-200">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

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

                <form class="mt-8 space-y-6" method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <input type="hidden" name="remember" value="true">
                    <div class="rounded-md space-y-4">
                        <div>
                            <label for="email-address"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                                address</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700"
                                placeholder="Email address" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700"
                                placeholder="Password">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 transform hover:scale-[1.02]">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-lock h-5 w-5 text-blue-500 group-hover:text-blue-400"></i>
                            </span>
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account?
                        <a href="{{ route('register') }}"
                            class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                            Sign up now
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
