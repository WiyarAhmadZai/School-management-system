@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
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
                                    <p class="text-2xl font-bold">1,248</p>
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
                                    <p class="text-2xl font-bold">86</p>
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
                                    <p class="text-2xl font-bold">32</p>
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

                        <!-- Attendance Card -->
                        <div
                            class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl shadow-lg p-6 text-white transform transition duration-500 hover:scale-105 animate-on-scroll">
                            <div class="flex items-center">
                                <div class="rounded-full bg-yellow-400 p-3 mr-4">
                                    <i class="fas fa-calendar-check text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm opacity-75">Attendance Rate</p>
                                    <p class="text-2xl font-bold">94%</p>
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
                        <!-- Enrollment Chart -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6 animate-on-scroll">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Enrollment Trends</h3>
                            <div class="h-64 flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-chart-line text-gray-300 text-4xl mb-3"></i>
                                    <p class="text-gray-500 dark:text-gray-300">Enrollment chart visualization</p>
                                    <p class="text-sm text-gray-400 mt-2">Interactive chart would appear here</p>
                                </div>
                            </div>
                        </div>

                        <!-- Grade Distribution -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6 animate-on-scroll">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Grade Distribution</h3>
                            <div class="h-64 flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-chart-pie text-gray-300 text-4xl mb-3"></i>
                                    <p class="text-gray-500 dark:text-gray-300">Grade distribution chart</p>
                                    <p class="text-sm text-gray-400 mt-2">Interactive chart would appear here</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow p-6 animate-on-scroll">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Recent Activities</h3>
                        <div class="space-y-4">
                            <div
                                class="flex items-start p-4 bg-gray-50 dark:bg-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-500 transition duration-200">
                                <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-full mr-3">
                                    <i class="fas fa-user-plus text-blue-500 dark:text-blue-300"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 dark:text-white">New student enrolled</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Ahmad Khan joined Mathematics
                                        course</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>

                            <div
                                class="flex items-start p-4 bg-gray-50 dark:bg-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-500 transition duration-200">
                                <div class="bg-green-100 dark:bg-green-900 p-2 rounded-full mr-3">
                                    <i class="fas fa-chalkboard-teacher text-green-500 dark:text-green-300"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 dark:text-white">Teacher added</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Dr. Sarah Johnson joined as
                                        Physics teacher</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">5 hours ago</p>
                                </div>
                            </div>

                            <div
                                class="flex items-start p-4 bg-gray-50 dark:bg-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-500 transition duration-200">
                                <div class="bg-purple-100 dark:bg-purple-900 p-2 rounded-full mr-3">
                                    <i class="fas fa-book text-purple-500 dark:text-purple-300"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 dark:text-white">New course created</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Advanced Computer Science has
                                        been added</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">1 day ago</p>
                                </div>
                            </div>
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
