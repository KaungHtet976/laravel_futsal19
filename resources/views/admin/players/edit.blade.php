{{-- resources/views/admin/players/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Edit Player</h3>
            <div class="form-card p-4 my-3 shadow-sm">
                <form action="{{ route('admin.players.update', ['player' => $player->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Player Name -->
                    <div class="mb-3">
                        <label for="playerName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="playerName" value="{{ old('name', $player->name) }}" required>
                        <x-error name="name"/>
                    </div>

                    <!-- Player Age -->
                    <div class="mb-3">
                        <label for="playerAge" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" id="playerAge" value="{{ old('age', $player->age) }}" required>
                        <x-error name="age"/>
                    </div>

                    <!-- Back Number -->
                    <div class="mb-3">
                        <label for="backNumber" class="form-label">Back Number</label>
                        <input type="number" name="back_number" class="form-control" id="backNumber" value="{{ old('back_number', $player->back_number) }}" required>
                        <x-error name="back_number"/>
                    </div>

                    <!-- Height -->
                    <div class="mb-3">
                        <label for="playerHeight" class="form-label">Height (cm)</label>
                        <input type="number" step="0.1" name="height" class="form-control" id="playerHeight" value="{{ old('height', $player->height) }}" required>
                        <x-error name="height"/>
                    </div>

                    <!-- Weight -->
                    <div class="mb-3">
                        <label for="playerWeight" class="form-label">Weight (kg)</label>
                        <input type="number" step="0.1" name="weight" class="form-control" id="playerWeight" value="{{ old('weight', $player->weight) }}" required>
                        <x-error name="weight"/>
                    </div>

                    <!-- Position -->
                    <div class="mb-3">
                        <label for="playerPosition" class="form-label">Position</label>
                        <input type="text" name="position" class="form-control" id="playerPosition" value="{{ old('position', $player->position) }}" required>
                        <x-error name="position"/>
                    </div>

                    <!-- Dominant Foot -->
                    <div class="mb-3">
                        <label for="dominantFoot" class="form-label">Dominant Foot</label>
                        <input type="text" name="dominant_foot" class="form-control" id="dominantFoot" value="{{ old('dominant_foot', $player->dominant_foot) }}" required>
                        <x-error name="dominant_foot"/>
                    </div>

                    <!-- Team -->
                    <div class="mb-3">
                        <label for="teamSelect" class="form-label">Team</label>
                        <select name="team_id" id="teamSelect" class="form-select" required>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}" {{ $team->id == $player->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                        <x-error name="team_id"/>
                    </div>

                    <!-- Rating -->
                    <div class="mb-3">
                        <label for="playerRating" class="form-label">Rating</label>
                        <input type="number" name="rating" class="form-control" id="playerRating" value="{{ old('rating', $player->rating) }}" required>
                        <x-error name="rating"/>
                    </div>

                    <!-- Profile Photo -->
                    <div class="mb-3">
                        <label for="profilePhoto" class="form-label">Profile Photo</label>
                        @if ($player->profile_photo)
                            <div class="mb-2">
                                <img id="currentProfilePhoto" src="{{ asset('storage/' . $player->profile_photo) }}" alt="Player Profile Photo" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        @endif
                        <input type="file" name="profile_photo" class="form-control" id="profilePhoto" onchange="previewProfilePhoto()">
                        <x-error name="profile_photo"/>
                    </div>

                    <!-- Cover Photo -->
                    <div class="mb-3">
                        <label for="coverPhoto" class="form-label">Cover Photo</label>
                        @if ($player->cover_photo)
                            <div class="mb-2">
                                <img id="currentCoverPhoto" src="{{ asset('storage/' . $player->cover_photo) }}" alt="Player Cover Photo" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        @endif
                        <input type="file" name="cover_photo" class="form-control" id="coverPhoto" onchange="previewCoverPhoto()">
                        <x-error name="cover_photo"/>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Player</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewProfilePhoto() {
    const fileInput = document.getElementById('profilePhoto');
    const preview = document.getElementById('currentProfilePhoto');
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function previewCoverPhoto() {
    const fileInput = document.getElementById('coverPhoto');
    const preview = document.getElementById('currentCoverPhoto');
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
@endsection
