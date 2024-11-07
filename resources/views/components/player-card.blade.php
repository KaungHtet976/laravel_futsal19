@props(['player'])

<div class="player-card-container">
  <a href="{{ route('players.show', ['id' => $player->id]) }}" class="player-card-link">
    <div class="player-card">
      <img
        src="{{ asset('/storage/' . $player->profile_photo) }}"
        class="player-card-img-top"
        alt="{{ $player->name }}"
      />
      <div class="player-card-overlay">
        <h3 class="player-card-title">{{ $player->name }}</h3>
        <div class="star-rating">
          <x-player-rating :rating="$player->rating" />
        </div>
      </div>
    </div>
  </a>
</div>
