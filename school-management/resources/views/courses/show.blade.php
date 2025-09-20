@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Course Details') }}
        </h2>
        <div class="space-x-2">
            <a href="{{ route('courses.edit', $course->id) }}"
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('courses.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to Courses
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Course Info Card -->
                        <div class="md:col-span-2">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Course Information</h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Course
                                            Name</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $course->name }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Course
                                            Code</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $course->code }}</p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Class</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $course->class ?? 'N/A' }}
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Department</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            {{ $course->department ?? 'N/A' }}</p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Credits</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $course->credits }}</p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                                        <p class="mt-1">
                                            @if ($course->status === 'active')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                                    Active
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                                    Inactive
                                                </span>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Description</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            {{ $course->description ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Teacher Card -->
                        <div>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 h-full">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Assigned Teacher</h3>

                                @if ($course->teacher)
                                    <div class="flex items-center">
                                        <div
                                            class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">
                                            {{ substr($course->teacher->name, 0, 1) }}
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $course->teacher->name }}</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                                {{ $course->teacher->subject ?? 'N/A' }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-4 space-y-2">
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                                {{ $course->teacher->email }}</p>
                                        </div>

                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-500 dark:text-gray-400">Phone</label>
                                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                                {{ $course->teacher->phone ?? 'N/A' }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <a href="{{ route('teachers.show', $course->teacher->id) }}"
                                            class="text-sm text-purple-600 hover:text-purple-900 dark:text-purple-400 dark:hover:text-purple-300">
                                            View Teacher Details <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-user-times text-2xl text-gray-400 mb-2"></i>
                                        <p class="text-gray-500 dark:text-gray-400">No teacher assigned</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Grades Section -->
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Student Grades</h3>

                        @if ($course->grades->count() > 0)
                            <div class="overflow-x-auto rounded-lg shadow">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Student</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Grade</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Marks</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($course->grades as $grade)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    {{ $grade->student->name }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    {{ $grade->grade }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    {{ $grade->marks ?? 'N/A' }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    {{ $grade->date->format('F j, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                <i class="fas fa-clipboard-list text-4xl mb-4"></i>
                                <p>No grades recorded for this course yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
