@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ route('home') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-home mr-2"></i> View Homepage
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Stats Section -->
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <!-- Students Card -->
                        <div
                            class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform transition duration-500 hover:scale-105 animate-on-scroll">
                            <div class="flex items-center">
                                <div class="rounded-full bg-blue-400 p-3 mr-4">
                                    <i class="fas fa-user-graduate text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm opacity-75">Total Students</p>
                                    <p class="text-2xl font-bold">{{ number_format($totalStudents) }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-sm">
                                    <span class="flex items-center">
                                        <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                                        <span class="text-green-300">12%</span>
                                    </span>
                                    <span class="ml-2 opacity-75">from last month</span>
                                </div>
                            </div>
                        </div>

                        <!-- Teachers Card -->
                        <div
                            class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white transform transition duration-500 hover:scale-105 animate-on-scroll">
                            <div class="flex items-center">
                                <div class="rounded-full bg-green-400 p-3 mr-4">
                                    <i class="fas fa-chalkboard-teacher text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm opacity-75">Total Teachers</p>
                                    <p class="text-2xl font-bold">{{ number_format($totalTeachers) }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-sm">
                                    <span class="flex items-center">
                                        <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                                        <span class="text-green-300">5%</span>
                                    </span>
                                    <span class="ml-2 opacity-75">from last month</span>
                                </div>
                            </div>
                        </div>

                        <!-- Courses Card -->
                        <div
                            class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white transform transition duration-500 hover:scale-105 animate-on-scroll">
                            <div class="flex items-center">
                                <div class="rounded-full bg-purple-400 p-3 mr-4">
                                    <i class="fas fa-book text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm opacity-75">Total Courses</p>
                                    <p class="text-2xl font-bold">{{ number_format($totalCourses) }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-sm">
                                    <span class="flex items-center">
                                        <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                                        <span class="text-green-300">8%</span>
                                    </span>
                                    <span class="ml-2 opacity-75">from last month</span>
                                </div>
                            </div>
                        </div>

                        <!-- Posts Card -->
                        <div
                            class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl shadow-lg p-6 text-white transform transition duration-500 hover:scale-105 animate-on-scroll">
                            <div class="flex items-center">
                                <div class="rounded-full bg-yellow-400 p-3 mr-4">
                                    <i class="fas fa-newspaper text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm opacity-75">Total Posts</p>
                                    <p class="text-2xl font-bold">{{ number_format($totalPosts) }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-sm">
                                    <span class="flex items-center">
                                        <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                                        <span class="text-green-300">3%</span>
                                    </span>
                                    <span class="ml-2 opacity-75">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <!-- Recent Students -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6 animate-on-scroll">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Recent Students</h3>
                            @if ($recentStudents->count() > 0)
                                <div class="space-y-3">
                                    @foreach ($recentStudents as $student)
                                        <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-600 rounded-lg">
                                            <div
                                                class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                                <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400"></i>
                                            </div>
                                            <div class="ml-3">
                                                <div class="font-medium text-gray-900 dark:text-white">
                                                    {{ $student->first_name }} {{ $student->last_name }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">Enrolled:
                                                    {{ $student->created_at->format('M d, Y') }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No students found.</p>
                            @endif
                        </div>

                        <!-- Recent Posts -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6 animate-on-scroll">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Recent Posts</h3>
                            @if ($recentPosts->count() > 0)
                                <div class="space-y-3">
                                    @foreach ($recentPosts as $post)
                                        <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-600 rounded-lg">
                                            <div
                                                class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                                <i class="fas fa-newspaper text-purple-600 dark:text-purple-400"></i>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="font-medium text-gray-900 dark:text-white">
                                                    {{ Str::limit($post->title, 30) }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">By
                                                    {{ $post->user->name }}</div>
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ $post->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No posts found.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6 animate-on-scroll">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Recent Activities</h3>
                        <div class="space-y-4">
                            @if ($recentStudents->count() > 0)
                                <div
                                    class="flex items-start p-4 bg-gray-50 dark:bg-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-500 transition duration-200">
                                    <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-full mr-3">
                                        <i class="fas fa-user-plus text-blue-500 dark:text-blue-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800 dark:text-white">New student enrolled</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $recentStudents->first()->first_name }}
                                            {{ $recentStudents->first()->last_name }} joined the school
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            {{ $recentStudents->first()->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if ($recentPosts->count() > 0)
                                <div
                                    class="flex items-start p-4 bg-gray-50 dark:bg-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-500 transition duration-200">
                                    <div class="bg-purple-100 dark:bg-purple-900 p-2 rounded-full mr-3">
                                        <i class="fas fa-newspaper text-purple-500 dark:text-purple-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800 dark:text-white">New post published</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            "{{ Str::limit($recentPosts->first()->title, 30) }}" by
                                            {{ $recentPosts->first()->user->name }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            {{ $recentPosts->first()->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if ($recentTeachers->count() > 0)
                                <div
                                    class="flex items-start p-4 bg-gray-50 dark:bg-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-500 transition duration-200">
                                    <div class="bg-green-100 dark:bg-green-900 p-2 rounded-full mr-3">
                                        <i class="fas fa-chalkboard-teacher text-green-500 dark:text-green-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800 dark:text-white">Teacher added</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $recentTeachers->first()->first_name }}
                                            {{ $recentTeachers->first()->last_name }} joined as teacher
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            {{ $recentTeachers->first()->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
        }

        .animated.fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
@endsection
