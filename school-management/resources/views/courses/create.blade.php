@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Course') }}
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
            <div class="beautiful-form">
                <h3 class="form-section-title">Course Information</h3>

                <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-grid">
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="form-label">Course Name *</label>
                            <input type="text" name="name" id="name" class="form-input"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Code -->
                        <div class="form-group">
                            <label for="code" class="form-label">Course Code *</label>
                            <input type="text" name="code" id="code" class="form-input"
                                value="{{ old('code') }}" required>
                            @error('code')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="image" class="form-label">Course Image</label>
                            <div class="form-file">
                                <i class="fas fa-cloud-upload-alt text-2xl mb-2"></i>
                                <p>Drag & drop your image here or click to browse</p>
                                <input type="file" name="image" id="image" class="hidden">
                            </div>
                            @error('image')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Credits -->
                        <div class="form-group">
                            <label for="credits" class="form-label">Credits *</label>
                            <input type="number" name="credits" id="credits" min="1" max="10"
                                class="form-input" value="{{ old('credits') }}" required>
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
                                        {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
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
                                value="{{ old('class') }}">
                            @error('class')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Department -->
                        <div class="form-group">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" name="department" id="department" class="form-input"
                                value="{{ old('department') }}">
                            @error('department')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="form-label">Status *</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="">Select Status</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group form-grid-full">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-textarea">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('courses.index') }}" class="btn-secondary">
                            <i class="fas fa-times btn-icon"></i> Cancel
                        </a>
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save btn-icon"></i> Save Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
