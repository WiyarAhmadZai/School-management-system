@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="beautiful-form">
                <h3 class="form-section-title">Create New Post</h3>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}"
                            required>
                        @error('title')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content" class="form-label">Content *</label>
                        <textarea name="content" id="content" rows="6" class="form-textarea" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Image (Optional)</label>
                        <div class="form-file">
                            <i class="fas fa-cloud-upload-alt text-2xl mb-2"></i>
                            <p>Drag & drop your image here or click to browse</p>
                            <input type="file" name="image" id="image" class="hidden" accept="image/*">
                        </div>
                        @error('image')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('news.index') }}" class="btn-secondary">
                            <i class="fas fa-times btn-icon"></i> Cancel
                        </a>
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-paper-plane btn-icon"></i> Create Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
