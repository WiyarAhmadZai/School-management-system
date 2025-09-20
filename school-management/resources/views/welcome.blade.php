<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'School Management System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="ml-3 text-xl font-bold text-gray-900 dark:text-white">SchoolMS</span>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 dark:bg-indigo-900/50 dark:text-indigo-300">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-500 to-indigo-700 dark:from-blue-700 dark:to-indigo-900">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative">
            <div class="text-center">
                <h1
                    class="text-4xl md:text-6xl font-extrabold text-white tracking-tight animate__animated animate__fadeInUp">
                    School Management System
                </h1>
                <p
                    class="mt-6 max-w-lg mx-auto text-xl text-blue-100 animate__animated animate__fadeInUp animate__delay-1s">
                    Comprehensive solution for managing students, teachers, courses, and grades efficiently
                </p>
                <div class="mt-10 flex justify-center gap-4 animate__animated animate__fadeInUp animate__delay-2s">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                            Get Started
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-8 py-3 border border-white text-base font-medium rounded-md text-white bg-transparent hover:bg-blue-700">
                            Create Account
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Latest News Section -->
    @if (isset($posts) && $posts->count() > 0)
        <div class="py-16 bg-gray-50 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        Latest News
                    </h2>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                        Stay updated with the latest announcements and events
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($posts as $post)
                        <div
                            class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <div
                                    class="bg-gray-200 dark:bg-gray-600 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                                    <i class="far fa-clock mr-1"></i>
                                    <span>{{ $post->time_ago }}</span>
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
                                    <div class="flex items-center">
                                        <a href="{{ route('profile.show', $post->user->id) }}"
                                            class="flex items-center">
                                            <div
                                                class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                                <i class="fas fa-user text-blue-600 dark:text-blue-400 text-xs"></i>
                                            </div>
                                            <span
                                                class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $post->user->name }}</span>
                                        </a>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <i class="far fa-eye mr-1"></i>
                                        <span>{{ $post->views }}</span>
                                    </div>
                                    <a href="{{ route('posts.show', $post) }}"
                                        class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-medium">
                                        Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('news.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        View All News
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Features Section -->
    <div class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    Powerful Features
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                    Everything you need to manage your educational institution efficiently
                </p>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <!-- Students Management -->
                    <div
                        class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 animate__animated animate__fadeInUp">
                        <div
                            class="w-16 h-16 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                            <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400 text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">Student Management</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Easily manage student records, attendance, and academic performance with our intuitive
                            interface.
                        </p>
                    </div>

                    <!-- Teacher Management -->
                    <div
                        class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 animate__animated animate__fadeInUp animate__delay-1s">
                        <div
                            class="w-16 h-16 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                            <i class="fas fa-chalkboard-teacher text-green-600 dark:text-green-400 text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">Teacher Management</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Keep track of teacher profiles, schedules, and assignments with our comprehensive system.
                        </p>
                    </div>

                    <!-- Course Management -->
                    <div
                        class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 animate__animated animate__fadeInUp animate__delay-2s">
                        <div
                            class="w-16 h-16 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                            <i class="fas fa-book text-purple-600 dark:text-purple-400 text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">Course Management</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Organize courses, curriculum, and class schedules with our easy-to-use course management
                            tools.
                        </p>
                    </div>

                    <!-- Grade Management -->
                    <div
                        class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 animate__animated animate__fadeInUp">
                        <div
                            class="w-16 h-16 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center">
                            <i class="fas fa-chart-line text-yellow-600 dark:text-yellow-400 text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">Grade Management</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Track and analyze student performance with our comprehensive grading and reporting system.
                        </p>
                    </div>

                    <!-- Attendance Tracking -->
                    <div
                        class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 animate__animated animate__fadeInUp animate__delay-1s">
                        <div
                            class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center">
                            <i class="fas fa-calendar-check text-red-600 dark:text-red-400 text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">Attendance Tracking</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Monitor student attendance and generate reports to identify patterns and improve engagement.
                        </p>
                    </div>

                    <!-- Reporting & Analytics -->
                    <div
                        class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 animate__animated animate__fadeInUp animate__delay-2s">
                        <div
                            class="w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                            <i class="fas fa-chart-pie text-indigo-600 dark:text-indigo-400 text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">Reports & Analytics</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Generate detailed reports and analytics to make data-driven decisions for your institution.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Preview Section -->
    <div class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    Intuitive Dashboard
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 lg:mx-auto">
                    Get a comprehensive overview of your school's performance at a glance
                </p>
            </div>

            <div class="mt-16">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">School Dashboard</h3>
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <!-- Stats Cards -->
                            <div
                                class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                                <div class="flex items-center">
                                    <div class="rounded-full bg-blue-400 p-3 mr-4">
                                        <i class="fas fa-user-graduate text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm opacity-75">Total Students</p>
                                        <p class="text-2xl font-bold">1,248</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                                <div class="flex items-center">
                                    <div class="rounded-full bg-green-400 p-3 mr-4">
                                        <i class="fas fa-chalkboard-teacher text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm opacity-75">Total Teachers</p>
                                        <p class="text-2xl font-bold">86</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                                <div class="flex items-center">
                                    <div class="rounded-full bg-purple-400 p-3 mr-4">
                                        <i class="fas fa-book text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm opacity-75">Total Courses</p>
                                        <p class="text-2xl font-bold">32</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl shadow-lg p-6 text-white">
                                <div class="flex items-center">
                                    <div class="rounded-full bg-yellow-400 p-3 mr-4">
                                        <i class="fas fa-calendar-check text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm opacity-75">Attendance Rate</p>
                                        <p class="text-2xl font-bold">94%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Chart Placeholder -->
                            <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Enrollment Trends
                                </h3>
                                <div
                                    class="h-64 flex items-center justify-center bg-gray-50 dark:bg-gray-600 rounded-lg">
                                    <div class="text-center">
                                        <i class="fas fa-chart-line text-gray-300 text-4xl mb-3"></i>
                                        <p class="text-gray-500 dark:text-gray-300">Enrollment chart visualization</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Activities -->
                            <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Recent Activities
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-start p-3 bg-gray-50 dark:bg-gray-600 rounded-lg">
                                        <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-full mr-3">
                                            <i class="fas fa-user-plus text-blue-500 dark:text-blue-300"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800 dark:text-white">New student enrolled
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">Ahmad Khan joined
                                                Mathematics course</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">2 hours ago</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start p-3 bg-gray-50 dark:bg-gray-600 rounded-lg">
                                        <div class="bg-green-100 dark:bg-green-900 p-2 rounded-full mr-3">
                                            <i
                                                class="fas fa-chalkboard-teacher text-green-500 dark:text-green-300"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800 dark:text-white">Teacher added</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">Dr. Sarah Johnson
                                                joined as Physics teacher</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">5 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 dark:from-blue-800 dark:to-indigo-900">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white">
                    Ready to transform your school management?
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-blue-100">
                    Join thousands of educational institutions using our system to streamline operations
                </p>
                <div class="mt-10">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                            class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                            Get Started Today
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-white">SchoolMS</span>
                </div>
                <div class="mt-8 md:mt-0">
                    <p class="text-center text-base text-gray-500 dark:text-gray-400">
                        &copy; 2025 School Management System. All rights reserved.
                    </p>
                </div>
                <div class="mt-8 md:mt-0">
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile menu script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Add JavaScript for show more functionality -->
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
        });
    </script>
</body>

</html>
