<div class="blog-card-container">
    <a href="{{ route('blogs.show', $blog->id) }}" class="blog-card-link">
        <div class="blog-card">
            @if(!empty($blog->photos))
                @php
                    $photos = is_array($blog->photos) ? $blog->photos : json_decode($blog->photos, true);
                @endphp
                @if(!empty($photos))
                    <img src="{{ asset('storage/' . $photos[0]) }}" class="card-img-top" alt="{{ $blog->title }}">
                @endif
            @endif
            <div class="blog-card-body">
                <h5 class="blog-card-title">{{ $blog->title }}</h5>
                <p class="blog-card-text">{{ $blog->intro }}</p>
                <p class="blog-card-text">
                    <small class="text-muted">
                        By {{ $blog->author }} | Created on {{ $blog->created_at->format('M d, Y') }}
                    </small>
                </p>
                
            </div>
        </div>
    </a>
</div>