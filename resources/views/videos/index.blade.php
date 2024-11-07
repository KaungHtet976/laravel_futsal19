@extends('layouts.app')

@section('content')

<section class="container text-center mt-5 section-top-space" id="videos">
   <h1 class="display-5 fw-bold mb-4">All Videos</h1>
   <div class="row">
     @foreach ($videos as $video)
     <div class="col-md-4 mb-4">
       {{-- Video Card --}}
       <x-video-card :video="$video"/>
     </div>
     @endforeach
   </div>

   
</section>

@endsection
