@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Details') }}
        </h2>
        <div class="space-x-2">
            <a href="{{ route('students.edit', $student->id) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('students.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to Students
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
                        <!-- Student Info Card -->
                        <div class="md:col-span-2">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Personal Information</h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Profile Image -->
                                    <div class="flex items-center">
                                        @if ($student->image)
                                            <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}"
                                                class="w-24 h-24 rounded-full object-cover">
                                        @else
                                            <div
                                                class="w-24 h-24 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                                <i class="fas fa-user text-gray-400 text-2xl"></i>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">
                                                {{ $student->name }}</h4>
                                            <p class="text-gray-600 dark:text-gray-400">Student</p>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email
                                            Address</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $student->email }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Phone
                                            Number</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $student->phone ?? 'N/A' }}
                                        </p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Date of
                                            Birth</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            {{ $student->date_of_birth ? $student->date_of_birth->format('F j, Y') : 'N/A' }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Address</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            {{ $student->address ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Card -->
                        <div>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 h-full">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Academic Information</h3>

                                <div class="space-y-4">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Class</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $student->class }}</p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Section</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $student->section }}</p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                                        <p class="mt-1">
                                            @if ($student->status === 'active')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                                    Active
                                                </span>
                                            @elseif($student->status === 'inactive')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                                    Inactive
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                                    On Leave
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Parent Info Card -->
                        <div class="md:col-span-3">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Parent Information</h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Parent
                                            Name</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            {{ $student->parent_name ?? 'N/A' }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Parent
                                            Phone</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            {{ $student->parent_phone ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grades Section -->
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Academic Grades</h3>

                        @if ($student->grades->count() > 0)
                            <div class="overflow-x-auto rounded-lg shadow">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Course</th>
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
                                        @foreach ($student->grades as $grade)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    {{ $grade->course->name }}</td>
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
                                <p>No grades recorded for this student yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
