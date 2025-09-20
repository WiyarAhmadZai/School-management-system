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
                                                <button type="button"
                                                    class="like-button {{ $post->isLikedByUser() ? 'text-red-500' : 'text-gray-500 hover:text-red-500' }} dark:text-gray-400 dark:hover:text-red-400 flex items-center"
                                                    data-post-id="{{ $post->id }}">
                                                    <i class="fas fa-heart mr-1"></i> <span
                                                        class="like-count">{{ $post->likes()->count() }}</span>
                                                </button>
                                                <button type="button"
                                                    class="share-button text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400 flex items-center"
                                                    data-post-id="{{ $post->id }}"
                                                    data-post-title="{{ $post->title }}"
                                                    data-post-url="{{ route('posts.show', $post) }}">
                                                    <i class="fas fa-share mr-1"></i> {{ $post->shares }}
                                                </button>
                                                <!-- Admin/Owner link to see who liked the post -->
                                                @if (auth()->check() && (auth()->user()->is_admin || auth()->id() == $post->user_id))
                                                    <button type="button"
                                                        class="show-likes-button text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400 flex items-center"
                                                        data-post-id="{{ $post->id }}">
                                                        <i class="fas fa-users mr-1"></i> {{ $post->likes()->count() }}
                                                    </button>
                                                @endif
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

    <!-- Likes Modal -->
    <div id="likes-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-2xl w-full max-h-[80vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Users Who Liked This Post</h3>
                    <button id="close-likes-modal"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div id="likes-modal-content">
                    <!-- Content will be loaded here via AJAX -->
                </div>
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div id="share-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full">
            <div class="p-6">
                <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Share Post</h3>
                    <button id="close-share-modal"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="mb-4">
                    <h4 id="share-post-title" class="text-lg font-semibold text-gray-900 dark:text-white"></h4>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <a href="#" id="whatsapp-share" target="_blank"
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center mb-2">
                            <i class="fab fa-whatsapp text-white text-xl"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 font-medium">WhatsApp</span>
                    </a>
                    <a href="#" id="telegram-share" target="_blank"
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center mb-2">
                            <i class="fab fa-telegram text-white text-xl"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Telegram</span>
                    </a>
                    <a href="#" id="tiktok-share" target="_blank"
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <div class="w-12 h-12 rounded-full bg-black flex items-center justify-center mb-2">
                            <i class="fab fa-tiktok text-white text-xl"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 font-medium">TikTok</span>
                    </a>
                    <a href="#" id="snapchat-share" target="_blank"
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <div class="w-12 h-12 rounded-full bg-yellow-400 flex items-center justify-center mb-2">
                            <i class="fab fa-snapchat text-white text-xl"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Snapchat</span>
                    </a>
                    <a href="#" id="facebook-share" target="_blank"
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center mb-2">
                            <i class="fab fa-facebook-f text-white text-xl"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Facebook</span>
                    </a>
                    <button id="copy-link-button"
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <div class="w-12 h-12 rounded-full bg-gray-500 flex items-center justify-center mb-2">
                            <i class="fas fa-link text-white text-xl"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Copy Link</span>
                    </button>
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

            // Handle like buttons with AJAX
            document.querySelectorAll('.like-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const postId = this.getAttribute('data-post-id');
                    const likeButton = this;
                    const likeCount = this.querySelector('.like-count');

                    // Send AJAX request
                    fetch(`/posts/${postId}/like`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.error) {
                                alert(data.error);
                                return;
                            }

                            // Update like count
                            likeCount.textContent = data.likes;

                            // Toggle button class based on like status
                            if (data.status === 'liked') {
                                likeButton.classList.remove('text-gray-500',
                                    'hover:text-red-500', 'dark:text-gray-400',
                                    'dark:hover:text-red-400');
                                likeButton.classList.add('text-red-500');
                            } else {
                                likeButton.classList.remove('text-red-500');
                                likeButton.classList.add('text-gray-500', 'hover:text-red-500',
                                    'dark:text-gray-400', 'dark:hover:text-red-400');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'An error occurred. Please try again.',
                            });
                        });
                });
            });

            // Handle share buttons
            document.querySelectorAll('.share-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const postId = this.getAttribute('data-post-id');
                    const postTitle = this.getAttribute('data-post-title');
                    const postUrl = this.getAttribute('data-post-url');

                    // Set post title in modal
                    document.getElementById('share-post-title').textContent = postTitle;

                    // Set share URLs
                    document.getElementById('whatsapp-share').href =
                        `https://api.whatsapp.com/send?text=${encodeURIComponent(postTitle + ' - ' + postUrl)}`;
                    document.getElementById('telegram-share').href =
                        `https://t.me/share/url?url=${encodeURIComponent(postUrl)}&text=${encodeURIComponent(postTitle)}`;
                    document.getElementById('tiktok-share').href = 'https://www.tiktok.com';
                    document.getElementById('snapchat-share').href = 'https://www.snapchat.com';
                    document.getElementById('facebook-share').href =
                        `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(postUrl)}`;

                    // Show modal
                    document.getElementById('share-modal').classList.remove('hidden');
                });
            });

            // Close share modal when close button is clicked
            document.getElementById('close-share-modal').addEventListener('click', function() {
                document.getElementById('share-modal').classList.add('hidden');
            });

            // Close share modal when clicking outside the modal content
            document.getElementById('share-modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                }
            });

            // Copy link functionality
            document.getElementById('copy-link-button').addEventListener('click', function() {
                const postUrl = document.querySelector('.share-button').getAttribute('data-post-url');
                navigator.clipboard.writeText(postUrl).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Copied!',
                        text: 'Link copied to clipboard!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to copy link.',
                    });
                });
            });

            // Handle likes modal
            const likesModal = document.getElementById('likes-modal');
            const closeLikesModal = document.getElementById('close-likes-modal');

            // Show likes modal when admin/owner clicks on the likes count
            document.querySelectorAll('.show-likes-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const postId = this.getAttribute('data-post-id');

                    // Fetch likes data via AJAX
                    fetch(`/posts/${postId}/likes`, {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.error,
                                });
                                return;
                            }

                            // Populate modal content
                            let content = `
                            <div class="mb-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">${data.post.title}</h4>
                                <p class="text-gray-600 dark:text-gray-300">${data.likedUsers.length} like(s)</p>
                            </div>
                            <div class="space-y-3">
                        `;

                            if (data.likedUsers.length > 0) {
                                data.likedUsers.forEach(user => {
                                    content += `
                                    <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                            <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="font-medium text-gray-900 dark:text-white">${user.name}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">Liked at: ${user.pivot.created_at}</div>
                                        </div>
                                    </div>
                                `;
                                });
                            } else {
                                content +=
                                    `<p class="text-gray-500 dark:text-gray-400 text-center py-4">No likes yet.</p>`;
                            }

                            content += `</div>`;

                            document.getElementById('likes-modal-content').innerHTML = content;
                            likesModal.classList.remove('hidden');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'An error occurred while fetching likes data.',
                            });
                        });
                });
            });

            // Close modal when close button is clicked
            closeLikesModal.addEventListener('click', function() {
                likesModal.classList.add('hidden');
            });

            // Close modal when clicking outside the modal content
            likesModal.addEventListener('click', function(e) {
                if (e.target === likesModal) {
                    likesModal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
