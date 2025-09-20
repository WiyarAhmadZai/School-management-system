@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Create New Post</h2>

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                            <input type="text" name="title" id="title"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                value="{{ old('title') }}" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Content</label>
                            <textarea name="content" id="content" rows="6"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                required>{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image
                                (Optional)</label>
                            <input type="file" name="image" id="image"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                accept="image/*">
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('news.index') }}"
                                class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
