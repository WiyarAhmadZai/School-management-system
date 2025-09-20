@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grade Details') }}
        </h2>
        <div class="space-x-2">
            <a href="{{ route('grades.edit', $grade->id) }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('grades.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to Grades
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
                        <!-- Grade Info Card -->
                        <div class="md:col-span-2">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Grade Information</h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Student</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $grade->student->name }}
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Course</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $grade->course->name }}</p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Grade</label>
                                        <p class="mt-1">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if ($grade->grade == 'A+' || $grade->grade == 'A') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                                @elseif($grade->grade == 'B+' || $grade->grade == 'B') bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100
                                                @elseif($grade->grade == 'C+' || $grade->grade == 'C') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                                @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @endif">
                                                {{ $grade->grade }}
                                            </span>
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Marks</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $grade->marks ?? 'N/A' }}
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Date</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            {{ $grade->date->format('F j, Y') }}</p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Remarks</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $grade->remarks ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Student & Course Info Card -->
                        <div>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 h-full space-y-6">
                                <!-- Student Info -->
                                <div>
                                    <h4 class="text-md font-medium text-gray-900 dark:text-white mb-3">Student Information
                                    </h4>

                                    <div class="flex items-center">
                                        <div
                                            class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold">
                                            {{ substr($grade->student->name, 0, 1) }}
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $grade->student->name }}</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                                {{ $grade->student->class }} - {{ $grade->student->section }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-3 space-y-2">
                                        <div>
                                            <label
                                                class="block text-xs font-medium text-gray-500 dark:text-gray-400">Email</label>
                                            <p class="text-sm text-gray-900 dark:text-white">{{ $grade->student->email }}
                                            </p>
                                        </div>

                                        <div>
                                            <label
                                                class="block text-xs font-medium text-gray-500 dark:text-gray-400">Parent</label>
                                            <p class="text-sm text-gray-900 dark:text-white">
                                                {{ $grade->student->parent_name ?? 'N/A' }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <a href="{{ route('students.show', $grade->student->id) }}"
                                            class="text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                            View Student Details <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Course Info -->
                                <div class="pt-4 border-t border-gray-200 dark:border-gray-600">
                                    <h4 class="text-md font-medium text-gray-900 dark:text-white mb-3">Course Information
                                    </h4>

                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $grade->course->name }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-300">{{ $grade->course->code }}</p>
                                    </div>

                                    <div class="mt-3 space-y-2">
                                        <div>
                                            <label
                                                class="block text-xs font-medium text-gray-500 dark:text-gray-400">Credits</label>
                                            <p class="text-sm text-gray-900 dark:text-white">{{ $grade->course->credits }}
                                            </p>
                                        </div>

                                        @if ($grade->course->teacher)
                                            <div>
                                                <label
                                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400">Teacher</label>
                                                <p class="text-sm text-gray-900 dark:text-white">
                                                    {{ $grade->course->teacher->name }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-3">
                                        <a href="{{ route('courses.show', $grade->course->id) }}"
                                            class="text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                            View Course Details <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
