@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    @auth
                        <div class="max-w-xl">
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Update Profile Information') }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Update your account\'s profile information and email address.') }}
                                </p>
                            </div>

                            <form method="POST" action="#">
                                @csrf
                                @method('PUT')

                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name', Auth::user()->name)" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email', Auth::user()->email)" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-6">
                                    <x-primary-button>
                                        {{ __('Save') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>

                        <div class="max-w-xl mt-12 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Update Password') }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                </p>
                            </div>

                            <form method="POST" action="#">
                                @csrf
                                @method('PUT')

                                <div>
                                    <x-input-label for="current_password" :value="__('Current Password')" />
                                    <x-text-input id="current_password" class="block mt-1 w-full" type="password"
                                        name="current_password" required />
                                    <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('New Password')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                        required />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-6">
                                    <x-primary-button>
                                        {{ __('Save') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>

                        <div class="max-w-xl mt-12 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Delete Account') }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                </p>
                            </div>

                            <div class="flex items-center justify-end mt-6">
                                <x-danger-button>
                                    {{ __('Delete Account') }}
                                </x-danger-button>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-gray-100 mb-4">
                                {{ __('Authentication Required') }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">
                                {{ __('You need to be logged in to view and edit your profile.') }}
                            </p>
                            <div class="flex justify-center space-x-4">
                                <a href="{{ route('login') }}"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    {{ __('Log in') }}
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700">
                                        {{ __('Register') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
