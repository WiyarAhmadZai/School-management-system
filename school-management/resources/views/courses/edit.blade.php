@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course') }}
        </h2>
        <a href="{{ route('courses.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Back to Courses
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="form-label">Course Name</label>
                                <input type="text" name="name" id="name" class="form-input"
                                    value="{{ old('name', $course->name) }}" required>
                                @error('name')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Code -->
                            <div class="form-group">
                                <label for="code" class="form-label">Course Code</label>
                                <input type="text" name="code" id="code" class="form-input"
                                    value="{{ old('code', $course->code) }}" required>
                                @error('code')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="image" class="form-label">Course Image</label>
                                <input type="file" name="image" id="image" class="form-file">
                                @if ($course->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="Current Image"
                                            class="w-20 h-20 object-cover rounded">
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Current image</p>
                                    </div>
                                @endif
                                @error('image')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Credits -->
                            <div class="form-group">
                                <label for="credits" class="form-label">Credits</label>
                                <input type="number" name="credits" id="credits" min="1" max="10"
                                    class="form-input" value="{{ old('credits', $course->credits) }}" required>
                                @error('credits')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Teacher -->
                            <div class="form-group">
                                <label for="teacher_id" class="form-label">Teacher</label>
                                <select name="teacher_id" id="teacher_id" class="form-select">
                                    <option value="">Select a teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ old('teacher_id', $course->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Class -->
                            <div class="form-group">
                                <label for="class" class="form-label">Class</label>
                                <input type="text" name="class" id="class" class="form-input"
                                    value="{{ old('class', $course->class) }}">
                                @error('class')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Department -->
                            <div class="form-group">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" id="department" class="form-input"
                                    value="{{ old('department', $course->department) }}">
                                @error('department')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="active"
                                        {{ old('status', $course->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive"
                                        {{ old('status', $course->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group form-row-full">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-textarea">{{ old('description', $course->description) }}</textarea>
                                @error('description')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="form-submit-btn">
                                <i class="fas fa-save mr-2"></i> Update Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
