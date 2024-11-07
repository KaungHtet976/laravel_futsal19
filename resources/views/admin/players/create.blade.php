{{-- resources/views/admin/players/create.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container section-top-space">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Add Player</h3>
            <div class="form-card p-4 my-3 shadow-sm">
                <form action="{{ route('admin.players.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="mb-3">
                        <label for="playerName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="playerName" required>
                        <x-error name="name"/>
                    </div>
                    <div class="mb-3">
                        <label for="playerAge" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" id="playerAge" required>
                        <x-error name="age"/>
                    </div>
                    <div class="mb-3">
                        <label for="backNumber" class="form-label">Back Number</label>
                        <input type="number"  name="back_number" class="form-control" id="backNumber" required>
                        <x-error name="backNumber"/>
                    </div>
                    <div class="mb-3">
                        <label for="playerHeight" class="form-label">Height</label>
                        <input type="number" step="0.1" placeholder="cetimeter" name="height" class="form-control" id="playerHeight" required>
                        <x-error name="height"/>
                    </div>
                    <div class="mb-3">
                        <label for="playerWeight" class="form-label">Weight</label>
                        <input type="number" step="0.1" placeholder="Kg" name="weight" class="form-control" id="playerWeight" required>
                        <x-error name="weight"/>
                    </div>
                    <div class="mb-3">
                        <label for="playerPosition" class="form-label">Position</label>
                        <input type="text" name="position" class="form-control" id="playerPosition" required>
                        <x-error name="position"/>
                    </div>
                    <div class="mb-3">
                        <label for="dominantFoot" class="form-label">Dominant Foot</label>
                        <input type="text" name="dominant_foot" class="form-control" id="dominantFoot" required>
                        <x-error name="dominant_foot"/>
                    </div>
                    <div class="mb-3">
                        <label for="teamSelect" class="form-label">Team</label>
                        <select name="team_id" id="teamSelect" class="form-select" required>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                        <x-error name="team_id"/>
                    </div>
                    <div class="mb-3">
                        <label for="rating-input" class="form-label">Rating</label>
                        <input type="number" name="rating" class="form-control" id="rating-input" required>
                        <x-error name="rating"/>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Profile Photo</label>
                        <input type="file" name="profile_photo" class="form-control" id="photo">
                    </div>
                    <div class="mb-3">
                        <label for="coverPhoto" class="form-label">Cover Photo</label>
                        <input type="file" name="cover_photo" class="form-control" id="coverPhoto">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Player</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
