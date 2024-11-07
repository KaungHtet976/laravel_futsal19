@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="player-cover">
                @if ($player->cover_photo)
                    <img
                        src="{{ asset('storage/' . $player->cover_photo) }}"
                        class="player-cover-photo"
                        alt="{{ $player->name }}"
                    />
                @else
                    <p>No Photo Available</p>
                @endif
            </div>
            <h3 class="text-center my-4">{{ $player->name }}</h3>
            <div class="player-details-grid">
                
                <div class="detail-item">
                    <strong>Team:</strong>
                    <p>{{ $player->team->name }}</p>
                </div>
                <div class="detail-item">
                    <strong>Age:</strong>
                    <p>{{ $player->age }}</p>
                </div>
                <div class="detail-item">
                    <strong>Height:</strong>
                    <p>{{ $player->height }} cm</p>
                </div>
                <div class="detail-item">
                    <strong>Weight:</strong>
                    <p>{{ $player->weight }} kg</p>
                </div>
                <div class="detail-item">
                    <strong>Position:</strong>
                    <p>{{ $player->position }}</p>
                </div>
                <div class="detail-item">
                    <strong>Dominant Foot:</strong>
                    <p>{{ $player->dominant_foot }}</p>
                </div>
                <div class="detail-item">
                    <strong>Back Number:</strong>
                    <p>{{ $player->back_number }}</p>
                </div>
                {{-- <div class="detail-item">
                    <strong>Rating:</strong>
                    <p><x-player-rating :rating="$player->rating" /></p>
                </div> --}}
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('players.index') }}" class="show-list-btn">Back to Players</a>
            </div>
        </div>
    </div>
</div>
@endsection
