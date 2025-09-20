@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Who Liked This Post') }}
        </h2>
        <a href="{{ route('posts.show', $post->id) }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Back to Post
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $post->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">{{ $post->getTimeAgoAttribute() }}</p>
                    </div>

                    @if ($likedUsers->count() > 0)
                        <div class="space-y-4">
                            @foreach ($likedUsers as $user)
                                <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                        <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $user->name }}</h4>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $user->email }}</p>
                                    </div>
                                    <div class="ml-auto text-sm text-gray-500 dark:text-gray-400">
                                        Liked {{ $user->pivot->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="fas fa-heart text-4xl text-gray-400 mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No likes yet</h3>
                            <p class="text-gray-500 dark:text-gray-400">This post hasn't received any likes yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection