@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Grade') }}
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
                    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Student -->
                            <div>
                                <label for="student_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Student</label>
                                <select name="student_id" id="student_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    required>
                                    <option value="">Select a student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ old('student_id', $grade->student_id) == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }} ({{ $student->class }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Course -->
                            <div>
                                <label for="course_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course</label>
                                <select name="course_id" id="course_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    required>
                                    <option value="">Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ old('course_id', $grade->course_id) == $course->id ? 'selected' : '' }}>
                                            {{ $course->name }} ({{ $course->code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Grade -->
                            <div>
                                <label for="grade"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grade</label>
                                <select name="grade" id="grade"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    required>
                                    <option value="">Select a grade</option>
                                    <option value="A+" {{ old('grade', $grade->grade) == 'A+' ? 'selected' : '' }}>A+
                                    </option>
                                    <option value="A" {{ old('grade', $grade->grade) == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B+" {{ old('grade', $grade->grade) == 'B+' ? 'selected' : '' }}>B+
                                    </option>
                                    <option value="B" {{ old('grade', $grade->grade) == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    <option value="C+" {{ old('grade', $grade->grade) == 'C+' ? 'selected' : '' }}>C+
                                    </option>
                                    <option value="C" {{ old('grade', $grade->grade) == 'C' ? 'selected' : '' }}>C
                                    </option>
                                    <option value="D" {{ old('grade', $grade->grade) == 'D' ? 'selected' : '' }}>D
                                    </option>
                                    <option value="F" {{ old('grade', $grade->grade) == 'F' ? 'selected' : '' }}>F
                                    </option>
                                </select>
                                @error('grade')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Marks -->
                            <div>
                                <label for="marks"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Marks</label>
                                <input type="number" name="marks" id="marks" step="0.01" min="0"
                                    max="100"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('marks', $grade->marks) }}">
                                @error('marks')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date -->
                            <div>
                                <label for="date"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                                <input type="date" name="date" id="date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    value="{{ old('date', $grade->date->format('Y-m-d')) }}" required>
                                @error('date')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remarks -->
                            <div class="md:col-span-2">
                                <label for="remarks"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Remarks</label>
                                <textarea name="remarks" id="remarks" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('remarks', $grade->remarks) }}</textarea>
                                @error('remarks')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                                <i class="fas fa-save mr-2"></i> Update Grade
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
