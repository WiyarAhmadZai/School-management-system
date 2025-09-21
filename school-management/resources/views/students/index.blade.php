@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
        <a href="{{ route('students.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300 transform hover:scale-105">
            <i class="fas fa-plus mr-2"></i> Add Student
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!-- Search and Filter Section -->
                    <form method="GET" action="{{ route('students.index') }}" class="mb-6">
                        <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 md:space-x-4">
                            <div class="relative flex-1">
                                <input type="text" name="search" placeholder="Search students..."
                                    value="{{ request('search') }}"
                                    class="pl-10 pr-4 py-2 border rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>

                            <div class="flex space-x-2">
                                <select name="class"
                                    class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    onchange="this.form.submit()">
                                    <option value="">All Classes</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class }}"
                                            {{ request('class') == $class ? 'selected' : '' }}>
                                            {{ $class }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="section"
                                    class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    onchange="this.form.submit()">
                                    <option value="">All Sections</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section }}"
                                            {{ request('section') == $section ? 'selected' : '' }}>
                                            {{ $section }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="status"
                                    class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
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
                                    <a href="{{ route('students.index') }}"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-2 rounded-lg flex items-center">
                                        <i class="fas fa-times mr-1"></i> Clear
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <!-- Students Table -->
                    <div class="overflow-x-auto rounded-lg shadow animate-on-scroll">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Student
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Class & Section
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Parent Info
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
                                @forelse($students as $student)
                                    <tr
                                        class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200 transform hover:scale-[1.01]">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if ($student->image)
                                                    <img src="{{ asset('storage/' . $student->image) }}"
                                                        alt="{{ $student->name }}"
                                                        class="h-10 w-10 rounded-full object-cover">
                                                @else
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <div
                                                            class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                                                            {{ substr($student->name, 0, 1) }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $student->name }}</div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-300">
                                                        {{ $student->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $student->class }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-300">{{ $student->section }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $student->parent_name }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-300">
                                                {{ $student->parent_phone }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
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
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('students.show', $student->id) }}"
                                                class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            No students found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
