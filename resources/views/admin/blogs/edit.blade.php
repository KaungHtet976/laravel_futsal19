@extends('layouts.app')

@section('content')

<div class="section-top-space">
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $blog->author) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="intro" class="form-label">Introduction</label>
            <input type="text" name="intro" id="intro" class="form-control" value="{{ old('intro', $blog->intro) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $blog->body) }}</textarea>
        </div>
    
        <div class="mb-3">
            <label for="photos" class="form-label">Photos</label>
            
            <!-- Display existing photos -->
            @if ($blog->photos)
                @php
                    $photos = json_decode($blog->photos, true);
                @endphp
                <div id="existing-photos" class="mb-3">
                    @foreach ($photos as $photo)
                        <div class="existing-photo mb-2 position-relative">
                            <img src="{{ asset('storage/' . $photo) }}" alt="Existing Photo" class="img-thumbnail" style="max-height: 150px;">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" onclick="removePhoto(this, '{{ $photo }}')">X</button>
                            <input type="hidden" name="existing_photos[]" value="{{ $photo }}">
                        </div>
                    @endforeach
                </div>
            @endif
    
            <!-- Upload new photos -->
            <input type="file" name="photos[]" class="form-control" id="photos" multiple onchange="previewNewPhotos()">
            <div id="new-photos-preview" class="mt-3"></div>
        </div>
    
        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
    
</div>
<script>

document.addEventListener('DOMContentLoaded', function() {
    // Preview new photos
    window.previewNewPhotos = function() {
        const fileInput = document.getElementById('photos');
        const previewContainer = document.getElementById('new-photos-preview');
        previewContainer.innerHTML = '';

        const files = fileInput.files;
        if (files.length > 0) {
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail');
                    img.style.maxHeight = '150px';
                    img.classList.add('mb-2');

                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    };

    // Remove existing photo
    window.removePhoto = function(button, photoPath) {
        // Remove the photo preview from DOM
        button.closest('.existing-photo').remove();

        // Add the photo path to a hidden input to be deleted on server-side
        let hiddenInput = document.querySelector(`input[name='existing_photos[]'][value='${photoPath}']`);
        if (hiddenInput) {
            hiddenInput.remove();
        }
    };
});


</script>
    
@endsection