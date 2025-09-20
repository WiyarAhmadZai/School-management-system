@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
        <a href="{{ route('posts.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-plus mr-2"></i> Create Post
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    @if (session('success'))
                        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($posts->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach ($posts as $post)
                                <div
                                    class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                    @if ($post->image)
                                        <a href="{{ route('posts.show', $post) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="w-full h-48 object-cover">
                                        </a>
                                    @else
                                        <a href="{{ route('posts.show', $post) }}">
                                            <div
                                                class="bg-gray-200 dark:bg-gray-600 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                                            </div>
                                        </a>
                                    @endif
                                    <div class="p-6">
                                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                                            <i class="far fa-clock mr-1"></i>
                                            <span>{{ $post->time_ago }}</span>
                                            <span class="mx-2">•</span>
                                            <i class="far fa-eye mr-1"></i>
                                            <span>{{ $post->views }}</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                            {{ $post->title }}</h3>

                                        <!-- Truncated description with show more -->
                                        <div class="post-description mb-4">
                                            <p class="text-gray-600 dark:text-gray-300 text-sm post-content-truncated">
                                                {{ Str::limit($post->content, 100) }}
                                                @if (strlen($post->content) > 100)
                                                    <span class="post-full-content hidden">{{ $post->content }}</span>
                                                    <a href="#"
                                                        class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-medium show-more">Show
                                                        more</a>
                                                @endif
                                            </p>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('profile.show', $post->user->id) }}"
                                                class="flex items-center">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                                    <i class="fas fa-user text-blue-600 dark:text-blue-400 text-xs"></i>
                                                </div>
                                                <span
                                                    class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $post->user->name }}</span>
                                            </a>

                                            <!-- Like and Share buttons -->
                                            <div class="flex space-x-2">
                                                <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="{{ $post->isLikedByUser() ? 'text-red-500' : 'text-gray-500 hover:text-red-500' }} dark:text-gray-400 dark:hover:text-red-400">
                                                        <i class="fas fa-heart"></i> {{ $post->likes }}
                                                    </button>
                                                </form>
                                                <div class="relative">
                                                    <button type="button" id="share-button-{{ $post->id }}"
                                                        class="text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400">
                                                        <i class="fas fa-share"></i> {{ $post->shares }}
                                                    </button>
                                                    <div id="share-options-{{ $post->id }}"
                                                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 hidden z-10">
                                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . route('posts.show', $post)) }}"
                                                            target="_blank"
                                                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <i class="fab fa-whatsapp mr-2 text-green-500"></i> WhatsApp
                                                        </a>
                                                        <a href="https://t.me/share/url?url={{ urlencode(route('posts.show', $post)) }}&text={{ urlencode($post->title) }}"
                                                            target="_blank"
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
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('posts.show', $post)) }}"
                                                            target="_blank"
                                                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <i class="fab fa-facebook mr-2 text-blue-600"></i> Facebook
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-newspaper text-5xl text-gray-400 mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No posts found</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-6">Be the first to create a post!</p>
                            <a href="{{ route('posts.create') }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg inline-flex items-center transition duration-300">
                                <i class="fas fa-plus mr-2"></i> Create Post
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript for show more functionality and share buttons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle show more/less links for all posts
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('show-more')) {
                    e.preventDefault();
                    const postContent = e.target.closest('.post-description');
                    const truncatedContent = postContent.querySelector('.post-content-truncated');
                    const fullContent = postContent.querySelector('.post-full-content');

                    if (truncatedContent && fullContent) {
                        truncatedContent.innerHTML = fullContent.textContent +
                            ' <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-medium show-less">Show less</a>';
                    }
                }

                if (e.target.classList.contains('show-less')) {
                    e.preventDefault();
                    const postContent = e.target.closest('.post-description');
                    const truncatedContent = postContent.querySelector('.post-content-truncated');
                    const fullContent = postContent.querySelector('.post-full-content');

                    if (truncatedContent && fullContent) {
                        truncatedContent.innerHTML = fullContent.textContent.substring(0, 100) +
                            '... <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-medium show-more">Show more</a>';
                    }
                }
            });

            // Handle share buttons
            document.querySelectorAll('[id^="share-button-"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const postId = this.id.replace('share-button-', '');
                    const shareOptions = document.getElementById('share-options-' + postId);
                    shareOptions.classList.toggle('hidden');
                });
            });

            // Close share options when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('[id^="share-button-"]') && !e.target.closest(
                        '[id^="share-options-"]')) {
                    document.querySelectorAll('[id^="share-options-"]').forEach(options => {
                        options.classList.add('hidden');
                    });
                }
            });
        });
    </script>
@endsection
