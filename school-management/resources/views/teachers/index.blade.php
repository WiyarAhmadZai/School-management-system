@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teachers') }}
        </h2>
        <a href="{{ route('teachers.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300 transform hover:scale-105">
            <i class="fas fa-plus mr-2"></i> Add Teacher
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!-- Search and Filter Section -->
                    <div class="flex flex-col md:flex-row justify-between mb-6 space-y-4 md:space-y-0">
                        <div class="relative">
                            <input type="text" placeholder="Search teachers..."
                                class="pl-10 pr-4 py-2 border rounded-lg w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>

                        <div class="flex space-x-2">
                            <select
                                class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option>All Subjects</option>
                                <option>Mathematics</option>
                                <option>Physics</option>
                                <option>Chemistry</option>
                                <option>English</option>
                            </select>

                            <select
                                class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option>All Departments</option>
                                <option>Science</option>
                                <option>Arts</option>
                                <option>Commerce</option>
                            </select>
                        </div>
                    </div>

                    <!-- Teachers Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($teachers as $teacher)
                            <div
                                class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-on-scroll">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-16 h-16 rounded-full bg-green-500 flex items-center justify-center text-white font-bold text-xl">
                                            {{ substr($teacher->name, 0, 1) }}
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $teacher->name }}</h3>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                {{ $teacher->subject ?? 'Not assigned' }}</p>
                                            <div class="flex items-center mt-1">
                                                <span class="text-yellow-500">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="text-gray-600 dark:text-gray-300 text-sm ml-1">4.5 (50
                                                    reviews)</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                            <span>Department</span>
                                            <span>{{ $teacher->department ?? 'N/A' }}</span>
                                        </div>
                                        <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300">
                                            <span>Email</span>
                                            <span class="text-blue-600 dark:text-blue-400">{{ $teacher->email }}</span>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-between">
                                        <a href="{{ route('teachers.show', $teacher->id) }}"
                                            class="px-4 py-2 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-200">
                                            <i class="fas fa-eye mr-1"></i> View
                                        </a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                                            class="px-4 py-2 bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition duration-200">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition duration-200"
                                                onclick="return confirm('Are you sure you want to delete this teacher?')">
                                                <i class="fas fa-trash mr-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3">
                                <div class="text-center py-12">
                                    <i class="fas fa-chalkboard-teacher text-5xl text-gray-400 mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No teachers found
                                    </h3>
                                    <p class="text-gray-500 dark:text-gray-400 mb-6">Get started by adding a new teacher.
                                    </p>
                                    <a href="{{ route('teachers.create') }}"
                                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center justify-center w-48 mx-auto transition duration-300">
                                        <i class="fas fa-plus mr-2"></i> Add Teacher
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection