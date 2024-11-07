@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Display success message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Blog Details Section --}}
        <div class="blog-details">
            {{-- Display Blog Photo --}}
            @if(!empty($blog->photos))
                @php
                    $photos = is_array($blog->photos) ? $blog->photos : json_decode($blog->photos, true);
                @endphp
                @foreach ($photos as $photo)
                    <img src="{{ asset('storage/' . $photo) }}" alt="Blog Photo" class="blog-photo">
                @endforeach
            @endif

            {{-- Blog Content --}}
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <p class="blog-meta">By {{ $blog->author }} | {{ $blog->created_at->format('F j, Y') }}</p>
            <hr>

            {{-- Display Introduction --}}
            <p class="blog-intro">{{ $blog->intro }}</p>

            {{-- Display Blog Body --}}
            <div class="blog-body">
                {!! nl2br(e($blog->body)) !!}
            </div>

            <hr>

            {{-- Like and Comment Section --}}
            <x-like-and-comment :blog="$blog" :isLiked="$blog->likes()->where('user_id', Auth::id())->exists()" />

            <hr>

            {{-- Back to Blog List --}}
            <a href="{{ route('blogs.index') }}" class="show-list-btn">Back to Blog List</a>
        </div>
    </div>
@endsection
