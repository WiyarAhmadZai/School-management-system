@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
        <a href="{{ route('posts.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Back to News
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center mb-6">
                        <a href="{{ route('profile.show', $post->user->id) }}" class="flex items-center">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                <i class="fas fa-user text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $post->user->name }}
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $post->time_ago }}</div>
                            </div>
                        </a>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $post->title }}</h1>

                    @if ($post->image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                class="w-full rounded-lg">
                        </div>
                    @endif

                    <div class="prose prose-gray dark:prose-invert max-w-none mb-6">
                        <p class="text-gray-700 dark:text-gray-300">{!! nl2br(e($post->content)) !!}</p>
                    </div>

                    <div class="flex justify-between items-center border-t border-gray-200 dark:border-gray-700 pt-4">
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                <i class="far fa-eye mr-2"></i>
                                <span>{{ $post->views }} views</span>
                            </div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                <i class="far fa-clock mr-2"></i>
                                <span>{{ $post->time_ago }}</span>
                            </div>
                        </div>

                        <div class="flex space-x-4">
                            <button type="button" 
                                class="like-button {{ $post->isLikedByUser() ? 'text-red-500' : 'text-gray-500 hover:text-red-500' }} dark:text-gray-400 dark:hover:text-red-400 flex items-center"
                                data-post-id="{{ $post->id }}">
                                <i class="fas fa-heart mr-1"></i> <span class="like-count">{{ $post->likes }}</span>
                            </button>
                            <div class="relative">
                                <button id="share-button" 
                                    class="text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400 flex items-center">
                                    <i class="fas fa-share mr-1"></i> {{ $post->shares }}
                                </button>
                                <div id="share-options" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 z-50 hidden">
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" 
                                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fab fa-whatsapp mr-2 text-green-500"></i> WhatsApp
                                    </a>
                                    <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" 
                                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fab fa-telegram mr-2 text-blue-500"></i> Telegram
                                    </a>
                                    <a href="https://www.tiktok.com" target="_blank" 
                                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fab fa-tiktok mr-2"></i> TikTok
                                    </a>
                                    <a href="https://www.snapchat.com" target="_blank" 
                                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fab fa-snapchat mr-2 text-yellow-500"></i> Snapchat
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" 
                                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fab fa-facebook mr-2 text-blue-600"></i> Facebook
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle like button with AJAX
            const likeButton = document.querySelector('.like-button');
            if (likeButton) {
                likeButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const postId = this.getAttribute('data-post-id');
                    const likeButton = this;
                    const likeCount = this.querySelector('.like-count');
                    
                    // Send AJAX request
                    fetch(`/posts/${postId}/like`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Update like count
                        likeCount.textContent = data.likes;
                        
                        // Toggle button class based on like status
                        if (data.status === 'liked') {
                            likeButton.classList.remove('text-gray-500', 'hover:text-red-500', 'dark:text-gray-400', 'dark:hover:text-red-400');
                            likeButton.classList.add('text-red-500');
                        } else {
                            likeButton.classList.remove('text-red-500');
                            likeButton.classList.add('text-gray-500', 'hover:text-red-500', 'dark:text-gray-400', 'dark:hover:text-red-400');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            }
            
            const shareButton = document.getElementById('share-button');
            const shareOptions = document.getElementById('share-options');
            
            if (shareButton && shareOptions) {
                shareButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    shareOptions.classList.toggle('hidden');
                });
                
                // Close share options when clicking outside
                document.addEventListener('click', function(e) {
                    if (!shareButton.contains(e.target) && !shareOptions.contains(e.target)) {
                        shareOptions.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endsection
