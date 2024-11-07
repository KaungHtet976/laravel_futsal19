@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Video</h1>

    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="video">Current Video:</label>
            <video width="320" controls>
                <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="form-group">
            <label for="video">Upload New Video (Optional):</label>
            <input type="file" name="video" class="form-control">
        </div>

        <div class="form-group">
            <label for="caption">Caption:</label>
            <textarea name="caption" class="form-control" rows="3">{{ $video->caption }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Video</button>
    </form>

    <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Video</button>
    </form>
</div>
@endsection
