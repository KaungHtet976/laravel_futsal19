@props(['rating'])
<div class="rating-container" data-rating="{{$rating}}">
    <div class="stars">
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="6">&#9733;</span>
        <span class="star" data-value="8">&#9733;</span>
        <span class="star" data-value="10">&#9733;</span>
    </div>
</div>

{{-- <script>

document.addEventListener('DOMContentLoaded', () => {
    const rating = parseInt('{{ $rating }}', 10); // Ensure Blade variable is treated as a string

if (isNaN(rating)) {
    console.error('Invalid rating value:', '{{ $rating }}');
    return;
}
    const stars = document.querySelectorAll('.star');

    function updateStars() {
        stars.forEach(star => {
            const value = parseInt(star.getAttribute('data-value'), 10);
            if (value <= rating) {
                star.classList.add('filled');
            } else {
                star.classList.remove('filled');
            }
        });
    }
    updateStars();
    
});
</script> --}}