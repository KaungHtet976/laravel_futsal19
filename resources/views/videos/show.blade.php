@extends('layouts.app')

@section('content')
<div class="container section-top-space">
    <div class="row">
        <div class="col-md-12">
            <!-- Video Player -->
            <div class="video-player mb-4">
                <video controls width="100%">
                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Video Caption -->
            <h3>{{ $video->caption }}</h3>

            <!-- Action Buttons: Download and Share -->
            <div class="d-flex mb-4">
                <!-- Download Button -->
                <a href="{{ route('videos.download', $video->id) }}" class="btn btn-success mr-3">
                    <i class="bi bi-download"></i> Download
                </a>

                <!-- Share Button -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle " type="button" id="shareDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-share"></i> Share
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="shareDropdown">
                        <!-- Facebook Share -->
                        <li>
                            <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                        </li>
                        <!-- Twitter Share -->
                        <li>
                            <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($video->caption) }}" target="_blank">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                        </li>
                        <!-- WhatsApp Share -->
                        <li>
                            <a class="dropdown-item" href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                        </li>
                        <!-- Copy Link -->
                        <li>
                            <a class="dropdown-item" href="#" onclick="copyToClipboard('{{ url()->current() }}')">
                                <i class="bi bi-clipboard"></i> Copy Link
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            
        </div>
    </div>
</div>

<!-- JavaScript to Copy Link to Clipboard -->
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Link copied to clipboard!');
        }, function(err) {
            alert('Failed to copy: ', err);
        });
    }
</script>
@endsection
