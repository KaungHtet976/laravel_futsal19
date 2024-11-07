@if (Auth::check())
    <!-- Like Section -->
    <div class="d-flex align-items-center">
        <!-- Like Button -->
        <button id="like-button" class="btn {{ $isLiked ? 'liked' : 'unliked' }}" data-blog-id="{{ $blog->id }}">
            <i id="like-icon" class="bi {{ $isLiked ? 'bi-heart-fill' : 'bi-heart' }}"></i>
        </button>
        <span id="like-count" class="mx-3"> {{ $blog->likes()->count() }} Likes</span>
        
    </div>


            
    <hr>

    <!-- Comments Section -->
    <div class="comment-section">
        <h4>Comments</h4>
    
        <!-- Existing Comments -->
        @if($blog->comments && $blog->comments->count() > 0)
            @foreach ($blog->comments as $comment)
                <div class="comment-box" data-comment-id="{{ $comment->id }}">
                    <strong>{{ $comment->user->name }}:</strong>
                    <span class="comment-content">{{ $comment->content }}</span>
    
                    @if(Auth::id() === $comment->user_id)
                        <!-- Edit and Delete Icons -->
                        <div class="comment-actions">
                            <button class="btn btn-sm btn-primary edit-comment-btn" data-comment-id="{{ $comment->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('comments.delete', $comment) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
    
                        <!-- Inline Edit Form -->
                        <div class="edit-comment-form d-none">
                            <form action="{{ route('comments.update', $comment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <textarea class="form-control" name="content" rows="3">{{ $comment->content }}</textarea>
                                <button type="submit" class="btn btn-primary">Update Comment</button>
                                <button type="button" class="btn btn-secondary cancel-edit-btn">Cancel</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <p>No comments yet.</p>
        @endif
    
        <!-- Add Comment Form -->
        <form id="comment-form" action="{{ route('blogs.comment.store', $blog) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="content" rows="3" placeholder="Add your comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    </div>
    
   
@else
    <!-- Display message for guests -->
    <p>Please <a href="{{ route('login') }}">log in</a> to like this blog and leave a comment.</p>
@endif

 