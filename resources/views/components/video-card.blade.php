<div class="video-card-container">
         <a href="{{route('videos.show',$video->id)}}" class="video-card-link">
            <div class="video-card">
                <video class="video-card-video" controls>
                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="video-card-overlay">
                    <h5 class="video-card-title">{{ $video->caption ?? 'Untitled' }}</h5>
                </div>
            </div>
         </a>
       </div>