@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Grade') }}
        </h2>
        <a href="{{ route('grades.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Back to Grades
        </a>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('grades.store') }}">
                        @csrf

                        <div class="form-row">
                            <!-- Student -->
                            <div class="form-group">
                                <label for="student_id" class="form-label">Student</label>
                                <select name="student_id" id="student_id" class="form-select" required>
                                    <option value="">Select a student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }} ({{ $student->class }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Course -->
                            <div class="form-group">
                                <label for="course_id" class="form-label">Course</label>
                                <select name="course_id" id="course_id" class="form-select" required>
                                    <option value="">Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                            {{ $course->name }} ({{ $course->code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Grade -->
                            <div class="form-group">
                                <label for="grade" class="form-label">Grade</label>
                                <select name="grade" id="grade" class="form-select" required>
                                    <option value="">Select a grade</option>
                                    <option value="A+" {{ old('grade') == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A" {{ old('grade') == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B+" {{ old('grade') == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B" {{ old('grade') == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C+" {{ old('grade') == 'C+' ? 'selected' : '' }}>C+</option>
                                    <option value="C" {{ old('grade') == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ old('grade') == 'D' ? 'selected' : '' }}>D</option>
                                    <option value="F" {{ old('grade') == 'F' ? 'selected' : '' }}>F</option>
                                </select>
                                @error('grade')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Marks -->
                            <div class="form-group">
                                <label for="marks" class="form-label">Marks</label>
                                <input type="number" name="marks" id="marks" step="0.01" min="0"
                                    max="100" class="form-input" value="{{ old('marks') }}">
                                @error('marks')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date" class="form-input"
                                    value="{{ old('date', now()->format('Y-m-d')) }}" required>
                                @error('date')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remarks -->
                            <div class="form-group form-row-full">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea name="remarks" id="remarks" rows="3" class="form-textarea">{{ old('remarks') }}</textarea>
                                @error('remarks')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="form-submit-btn">
                                <i class="fas fa-save mr-2"></i> Save Grade
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
