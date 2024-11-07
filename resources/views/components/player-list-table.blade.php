<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    {{-- player list talbe  --}}
  
    <div class="all-list-table-container">
        <div class="row">
            <div class="col-md-12">
                <h3 class=" text-center my-2">Players</h3>
                <div class="table-card p-4 my-3 shadow sm">
                    {{-- table --}}
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Team</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <td>
                                        @if ($player->profile_photo)
                                            <img src="{{ asset('storage/' . $player->profile_photo) }}" alt="{{ $player->name }}" class="img-thumbnail" width="50">
                                        @else
                                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="No photo available" class="img-thumbnail" width="50">
                                        @endif
                                    </td>
                                    
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->team->name }}</td>
                                    <td>{{ $player->position }}</td>
                                    <td>
                                        <a href="{{ route('admin.players.edit', ['player' => $player->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                            Edit</a>
                                        <form action="{{ route('admin.players.delete', ['player' => $player->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete</button>
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
            href="/admin/players/create">  Add Player</a>
        </div>
      </div>
    </div>
    
</div>