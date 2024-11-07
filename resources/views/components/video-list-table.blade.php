<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center my-2">Videos</h3>
            <div class="table-card p-4 my-3 shadow-sm">
                {{-- Video table --}}
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Video</th>
                            <th>Caption</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>
                                    <video width="150" controls>
                                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td>{{ $video->caption ?? 'No caption available' }}</td>
                                <td>
                                    <a href="{{route('admin.videos.edit',$video->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{route('admin.videos.destroy',$video->id)}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="mb-5">
            <a type="button" class="btn btn-outline-primary btn-lg px-4 mx-3 mt-3" href="/admin/videos/create">Add Video</a>
        </div>
    </div>
</div>
