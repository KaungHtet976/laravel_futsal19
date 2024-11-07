@extends('layouts.app')

@section('content')

<section class="container text-center mt-5 section-top-space" id="player">
   <h1 class="display-5 fw-bold mb-4">All Players</h1>
   <div class="row">
     @foreach ($players as $player)
     <div class="col-md-4 mb-4">
       {{-- Player Card Component --}}
       <x-player-card :player="$player"/>
     </div>
     @endforeach
   </div>

   <div class="d-flex justify-content-center mt-4">
       {{ $players->links() }} {{-- Pagination links --}}
      
   </div>
</section>

@endsection
