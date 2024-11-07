<nav class="navbar">
    <div class="container navbar-container">
        <!-- Logo Section -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>

        <!-- Hamburger icon for mobile view -->
        <div class="hamburger" id="hamburger-menu">
            &#9776; <!-- Hamburger icon -->
        </div>

        <!-- Navigation Links -->
        <div class="nav-links" id="nav-links">
            <a href="{{'/'}}" class="nav-link">Home</a>
            <a href="#" class="nav-link">About</a>
            <a href="#contact" class="nav-link">Contact</a>
            <a href="#" class="nav-link">Court</a>
            <a href="{{ route('videos.index') }}" class="nav-link">Video</a>
            <a href="{{ route('blogs.index') }}" class="nav-link">Blogs</a>
            <a href="{{ route('players.index') }}" class="nav-link">Players</a>
        </div>
    </div>
</nav>
