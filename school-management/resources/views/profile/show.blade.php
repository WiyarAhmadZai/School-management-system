@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Profile') }}
        </h2>
        <div class="flex space-x-2">
            <a href="{{ route('profile.edit') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-edit mr-2"></i> Edit Profile
            </a>
            <a href="{{ url()->previous() }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col items-center mb-6">
                        <div class="relative">
                            @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-800 shadow-lg">
                            @else
                                <div
                                    class="w-32 h-32 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center border-4 border-white dark:border-gray-800 shadow-lg">
                                    <i class="fas fa-user text-blue-600 dark:text-blue-400 text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="mt-4 text-center">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h1>
                            <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Member since
                                {{ $user->created_at->format('F Y') }}</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">User Posts</h3>

                        @php
                            $userPosts = $user->posts()->latest()->take(5)->get();
                        @endphp

                        @if ($userPosts->count() > 0)
                            <div class="space-y-4">
                                @foreach ($userPosts as $post)
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $post->title }}</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-1">
                                            {{ Str::limit($post->content, 100) }}
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mt-2">
                                            <i class="far fa-clock mr-1"></i>
                                            <span>{{ $post->time_ago }}</span>
                                            <span class="mx-2">•</span>
                                            <i class="far fa-eye mr-1"></i>
                                            <span>{{ $post->views }} views</span>
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-heart text-red-500 mr-1"></i>
                                            <span>{{ $post->likes }}</span>
                                        </div>
                                        <a href="{{ route('posts.show', $post) }}"
                                            class="text-blue-600 dark:text-blue-400 hover:underline text-sm mt-2 inline-block">
                                            Read more
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400">This user hasn't posted anything yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
