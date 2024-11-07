@extends('layouts.app') 

@section('content')

    <section class="container text-center mt-5 section-top-space" id="blog">
        <h1 class="display-5 fw-bold mb-4">All blogs</h1>
        <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4 mb-4">
            {{-- blog Card Component --}}
            <x-blog-card :blog="$blog"/>
        </div>
        @endforeach
        </div>
    
        <div class="d-flex justify-content-center mt-4">
           
        
        </div>
    </section>
   
@endsection

















