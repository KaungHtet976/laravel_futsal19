<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-primary text-center my-2">Teams</h3>
                <div class="table-card p-4 my-3 shadow-sm">
                    <!-- Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Team Name</th>
                                <th>Coach Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                            <tr>
                                <td>{{ $team->id }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->coach }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.teams.edit', [ 'team' => $team->id]) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{route('admin.teams.delete', ['team' => $team->id])}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
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
            <div class="mb-5 ">
                <a type="button" 
                class="btn btn-outline-primary btn-lg px-4 mx-3 mt-3" 
                href="/admin/teams/create">  Add Team</a>
            </div>
        </div>
    </div>
</div>