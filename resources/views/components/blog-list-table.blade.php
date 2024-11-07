
    <div>
        <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
        {{-- player list talbe  --}}
      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary text-center my-2">Blogs</h3>
                    <div class="table-card p-4 my-3 shadow sm">
                        {{-- table --}}
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Intro</th>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            @if (!empty($blog->photos))
                                                @php
                                                    $photos = is_array($blog->photos) ? $blog->photos : json_decode($blog->photos, true);
                                                @endphp
                                                @if (!empty($photos))
                                                    <img src="{{ asset('storage/' . $photos[0]) }}" alt="{{ $blog->title }}" class="img-thumbnail" width="50">
                                                @else
                                                    No Photo
                                                @endif
                                            @else
                                                No Photo
                                            @endif
                                        </td>
                                        
                                        <td>{{ $blog->title}}</td>
                                        <td>{{ $blog->intro }}</td>
                                        <td>{{ $blog->author }}</td>
                                        <td>
                                            <a href="{{ route('admin.blogs.edit', ['id' => $blog->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.blogs.destroy', ['id' => $blog->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
                <a type="button" 
                class="btn btn-outline-primary btn-lg px-4 mx-3 mt-3" 
                href="/admin/blogs/create">  Add Blog</a>
            </div>
          </div>
        </div>
        
    </div>
