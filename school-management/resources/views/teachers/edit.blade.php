@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Teacher') }}
        </h2>
        <a href="{{ route('teachers.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Back to Teachers
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('teachers.update', $teacher->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('name', $teacher->name) }}" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('email', $teacher->email) }}" required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                                <input type="text" name="phone" id="phone"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('phone', $teacher->phone) }}">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                                <input type="text" name="subject" id="subject"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('subject', $teacher->subject) }}">
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Department -->
                            <div>
                                <label for="department"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Department</label>
                                <input type="text" name="department" id="department"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('department', $teacher->department) }}">
                                @error('department')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Qualification -->
                            <div>
                                <label for="qualification"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Qualification</label>
                                <input type="text" name="qualification" id="qualification"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('qualification', $teacher->qualification) }}">
                                @error('qualification')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <label for="date_of_birth"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('date_of_birth', $teacher->date_of_birth ? $teacher->date_of_birth->format('Y-m-d') : '') }}">
                                @error('date_of_birth')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Salary -->
                            <div>
                                <label for="salary"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Salary</label>
                                <input type="number" name="salary" id="salary" step="0.01"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('salary', $teacher->salary) }}">
                                @error('salary')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="md:col-span-2">
                                <label for="address"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                                <textarea name="address" id="address" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('address', $teacher->address) }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <select name="status" id="status"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    required>
                                    <option value="active"
                                        {{ old('status', $teacher->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive"
                                        {{ old('status', $teacher->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="on_leave"
                                        {{ old('status', $teacher->status) == 'on_leave' ? 'selected' : '' }}>On Leave
                                    </option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                                <i class="fas fa-save mr-2"></i> Update Teacher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
