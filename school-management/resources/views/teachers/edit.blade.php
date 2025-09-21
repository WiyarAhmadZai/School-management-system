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
                    <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name" class="form-input"
                                    value="{{ old('name', $teacher->name) }}" required>
                                @error('name')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-input"
                                    value="{{ old('email', $teacher->email) }}" required>
                                @error('email')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" name="image" id="image" class="form-file">
                                @if ($teacher->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $teacher->image) }}" alt="Current Image"
                                            class="w-20 h-20 object-cover rounded-full">
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Current image</p>
                                    </div>
                                @endif
                                @error('image')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-input"
                                    value="{{ old('phone', $teacher->phone) }}">
                                @error('phone')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subject -->
                            <div class="form-group">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-input"
                                    value="{{ old('subject', $teacher->subject) }}">
                                @error('subject')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Department -->
                            <div class="form-group">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" id="department" class="form-input"
                                    value="{{ old('department', $teacher->department) }}">
                                @error('department')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Qualification -->
                            <div class="form-group">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" name="qualification" id="qualification" class="form-input"
                                    value="{{ old('qualification', $teacher->qualification) }}">
                                @error('qualification')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-input"
                                    value="{{ old('date_of_birth', $teacher->date_of_birth ? $teacher->date_of_birth->format('Y-m-d') : '') }}">
                                @error('date_of_birth')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="form-group form-row-full">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" rows="3" class="form-textarea">{{ old('address', $teacher->address) }}</textarea>
                                @error('address')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Salary -->
                            <div class="form-group">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" step="0.01" name="salary" id="salary" class="form-input"
                                    value="{{ old('salary', $teacher->salary) }}">
                                @error('salary')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="active"
                                        {{ old('status', $teacher->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive"
                                        {{ old('status', $teacher->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="on_leave"
                                        {{ old('status', $teacher->status) == 'on_leave' ? 'selected' : '' }}>On Leave
                                    </option>
                                </select>
                                @error('status')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="form-submit-btn">
                                <i class="fas fa-save mr-2"></i> Update Teacher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
