<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-primary text-center my-2">Users</h3>
                <div class="table-card p-4 my-3 shadow-sm">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        @if ($user->photo)
                                            <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="img-thumbnail" width="50">
                                        @else
                                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="No photo available" class="img-thumbnail" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST" style="display:inline;">
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
    </div>
    
</div>