@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
        <a href="{{ route('courses.create') }}"
            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300 transform hover:scale-105">
            <i class="fas fa-plus mr-2"></i> Add Course
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!-- Search and Filter Section -->
                    <form method="GET" action="{{ route('courses.index') }}" class="mb-6">
                        <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 md:space-x-4">
                            <div class="relative flex-1">
                                <input type="text" name="search" placeholder="Search courses..."
                                    value="{{ request('search') }}"
                                    class="pl-10 pr-4 py-2 border rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>

                            <div class="flex space-x-2">
                                <select name="class"
                                    class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    onchange="this.form.submit()">
                                    <option value="">All Classes</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class }}"
                                            {{ request('class') == $class ? 'selected' : '' }}>
                                            {{ $class }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="department"
                                    class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    onchange="this.form.submit()">
                                    <option value="">All Departments</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department }}"
                                            {{ request('department') == $department ? 'selected' : '' }}>
                                            {{ $department }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="status"
                                    class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    onchange="this.form.submit()">
                                    <option value="">All Statuses</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}"
                                            {{ request('status') == $status ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                                        </option>
                                    @endforeach
                                </select>

                                @if (request()->except('page'))
                                    <a href="{{ route('courses.index') }}"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-2 rounded-lg flex items-center transition duration-300">
                                        <i class="fas fa-times mr-1"></i> Clear
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <!-- Courses Table -->
                    <div class="overflow-x-auto rounded-lg shadow animate-on-scroll">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Course
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Code
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Teacher
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Class
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Credits
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($courses as $course)
                                    <tr
                                        class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200 transform hover:scale-[1.01]">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if ($course->image)
                                                    <img src="{{ asset('storage/' . $course->image) }}"
                                                        alt="{{ $course->name }}" class="h-10 w-10 rounded object-cover">
                                                @else
                                                    <div
                                                        class="h-10 w-10 rounded bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                                        <i class="fas fa-book text-purple-500 dark:text-purple-300"></i>
                                                    </div>
                                                @endif
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $course->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $course->code }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">
                                                {{ $course->teacher->name ?? 'Not assigned' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $course->class }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $course->credits }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
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
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('courses.show', $course->id) }}"
                                                class="text-purple-600 hover:text-purple-900 dark:text-purple-400 dark:hover:text-purple-300 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="text-purple-600 hover:text-purple-900 dark:text-purple-400 dark:hover:text-purple-300 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                                    onclick="return confirm('Are you sure you want to delete this course?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            No courses found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $courses->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
