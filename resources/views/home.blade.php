@extends('layouts.app')

@section('content')
<section class="hero-container mt-5">
  <x-hero/>
</section>

<section class="container text-center mt-5" id="blog">
  <h1 class="display-5 fw-bold mb-4">Blogs</h1>
  <div class="row">
    @foreach ($blogs as $blog)
    <div class="col-md-4 mb-4">
     
      <x-blog-card :blog="$blog"/>
    </div>
        
    @endforeach
  </div>
</section>

<section class="container text-center mt-5 section-top-space" id="player">
   <h1 class="display-5 fw-bold mb-4">Player</h1>
   <div class="row">
     @foreach ($players as $player)
     <div class="col-md-4 mb-4">
      
       <x-player-card :player="$player"/>
     </div>
         
     @endforeach
   </div>
 </section>

 <section>
  <x-contact/>
</section>
@endsection