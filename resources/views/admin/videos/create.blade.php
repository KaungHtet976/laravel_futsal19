
@extends('layouts.app')
@section('content')
<div class="container section-top-space">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Upload Video</h3>
            <div class="form-card p-4 my-3 shadow-sm">
               
                <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="video">Upload Video:</label>
                        <input type="file" name="video" class="form-control" required>
                    </div>
                
                    <div>
                        <label for="caption">Caption:</label>
                        <textarea name="caption" class="form-control"></textarea>
                    </div>
                
                    <button class="btn btn-outline-primary mt-3" type="submit">Upload Video</button>
                </form>
                   
            </div>
        </div>
    </div>
</div>
@endsection


























