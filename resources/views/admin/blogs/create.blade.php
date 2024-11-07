{{-- resources/views/admin/blogs/create.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container section-top-space">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Create Blog</h3>
            <div class="form-card p-4 my-3 shadow-sm">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="blogTitle" class="form-label">Blog Title</label>
                        <input type="text" name="title" class="form-control" id="blogTitle" required>
                        <x-error name="title"/>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" id="author" required>
                        <x-error name="author"/>
                    </div>
                    <div class="mb-3">
                        <label for="blogIntro" class="form-label">Introduction</label>
                        <input type="text" name="intro" class="form-control" id="blogIntro" required>
                        <x-error name="intro"/>
                    </div>
                    <div class="mb-3">
                        <label for="blogBody" class="form-label">Body</label>
                        <textarea name="body" class="form-control" id="blogBody" required></textarea>
                        <x-error name="body"/>
                    </div>
                    <div class="mb-3">
                        <label for="photos" class="form-label">Photos</label>
                        <input type="file" name="photos[]" class="form-control" id="photos" multiple>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Post Blog</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
