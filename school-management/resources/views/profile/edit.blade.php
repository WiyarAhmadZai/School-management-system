@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
        <a href="{{ route('profile.show') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Back to Profile
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @auth
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Profile Photo Section -->
                            <div class="lg:col-span-1">
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-sm">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                                        {{ __('Profile Photo') }}
                                    </h3>

                                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                @if (Auth::user()->photo)
                                                    <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                                        alt="{{ Auth::user()->name }}"
                                                        class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-lg">
                                                @else
                                                    <div
                                                        class="w-32 h-32 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center border-4 border-white dark:border-gray-700 shadow-lg">
                                                        <i class="fas fa-user text-blue-600 dark:text-blue-400 text-4xl"></i>
                                                    </div>
                                                @endif

                                                <label for="photo"
                                                    class="absolute bottom-2 right-2 bg-blue-600 text-white rounded-full p-2 cursor-pointer hover:bg-blue-700 transition-colors shadow-md">
                                                    <i class="fas fa-camera"></i>
                                                    <input type="file" id="photo" name="photo" class="hidden"
                                                        accept="image/*">
                                                </label>
                                            </div>

                                            <p class="mt-4 text-sm text-gray-600 dark:text-gray-400 text-center">
                                                {{ __('Click the camera icon to upload a new profile photo. JPG, PNG, or GIF files are accepted.') }}
                                            </p>

                                            <button type="submit" class="mt-6 w-full form-submit-btn">
                                                {{ __('Update Photo') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Profile Information Section -->
                            <div class="lg:col-span-2">
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-sm">
                                    <div class="mb-8">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Update Profile Information') }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Update your account\'s profile information and email address.') }}
                                        </p>
                                    </div>

                                    <form method="POST" action="{{ route('profile.update') }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name" class="form-label">
                                                {{ __('Name') }}
                                            </label>
                                            <input id="name" class="form-input" type="text" name="name"
                                                value="{{ old('name', Auth::user()->name) }}" required autofocus />
                                            @if ($errors->has('name'))
                                                <div class="form-error">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">
                                                {{ __('Email') }}
                                            </label>
                                            <input id="email" class="form-input" type="email" name="email"
                                                value="{{ old('email', Auth::user()->email) }}" required />
                                            @if ($errors->has('email'))
                                                <div class="form-error">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>

                                        <div class="flex items-center justify-end mt-6">
                                            <button type="submit" class="form-submit-btn">
                                                {{ __('Save Changes') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Password Update Section -->
                                <div class="mt-8 bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-sm">
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

                                        <div class="form-group">
                                            <label for="current_password" class="form-label">
                                                {{ __('Current Password') }}
                                            </label>
                                            <input id="current_password" class="form-input" type="password"
                                                name="current_password" required />
                                            @if ($errors->has('current_password'))
                                                <div class="form-error">{{ $errors->first('current_password') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="form-label">
                                                {{ __('New Password') }}
                                            </label>
                                            <input id="password" class="form-input" type="password" name="password" required />
                                            @if ($errors->has('password'))
                                                <div class="form-error">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-label">
                                                {{ __('Confirm Password') }}
                                            </label>
                                            <input id="password_confirmation" class="form-input" type="password"
                                                name="password_confirmation" required />
                                            @if ($errors->has('password_confirmation'))
                                                <div class="form-error">{{ $errors->first('password_confirmation') }}</div>
                                            @endif
                                        </div>

                                        <div class="flex items-center justify-end mt-6">
                                            <button type="submit" class="form-submit-btn">
                                                {{ __('Update Password') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Delete Account Section -->
                                <div class="mt-8 bg-red-50 dark:bg-red-900/20 rounded-xl p-6 shadow-sm">
                                    <div class="mb-8">
                                        <h3 class="text-lg font-medium text-red-800 dark:text-red-200">
                                            {{ __('Delete Account') }}
                                        </h3>
                                        <p class="mt-1 text-sm text-red-700 dark:text-red-300">
                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-end">
                                        <button type="button"
                                            class="bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-lg transition duration-300">
                                            {{ __('Delete Account') }}
                                        </button>
                                    </div>
                                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Preview selected image
            const photoInput = document.getElementById('photo');
            if (photoInput) {
                photoInput.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            // Find the image element and update its source
                            const imgElement = document.querySelector('.relative img');
                            if (imgElement) {
                                imgElement.src = event.target.result;
                            } else {
                                // If no image exists, replace the placeholder
                                const placeholder = document.querySelector('.relative div');
                                if (placeholder) {
                                    placeholder.outerHTML =
                                        `<img src="${event.target.result}" alt="Preview" class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-lg">`;
                                }
                            }
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }
        });
    </script>
@endsection
