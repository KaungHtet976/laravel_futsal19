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

    <div class="dashboard-container section-top-space ">
        <!-- Add this inside the body, at the top -->
        <div class="toggle-sidebar-btn">☰ Menu</div>

        <!-- Sidebar -->
        <div class="sidebar">
           
            <div class="sidebar-header">
                <h2>Futsal 19 Admin</h2>
            </div>
            <ul class="sidebar-menu">
                <li id="dashboardLink"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
                <li id="playersLink"><i class="fas fa-users"></i> Players</li>
                <li id="blogsLink"><i class="fas fa-blog"></i> Blogs</li>
                <li id="videosLink"><i class="fas fa-video"></i> Videos</li>
                <li id="teamsLink"><i class="fas fa-users-cog"></i> Teams</li>
                <li id="usersLink"><i class="fas fa-user"></i> Users</li>
            </ul>
        </div>

        <!-- Main Content -->
       
        <div class="dash-main-content">
            <!-- Dashboard Content -->
            <div class="dashboard" id="dashboardContent">
                <div class="dashboard-cards">
                    <div class="card">
                        <h3>Total Registered Users</h3>
                        <p><i class="fas fa-user"></i> {{$totalUsers}}</p>
                    </div>
                    <div class="card">
                        <h3>Visited Users</h3>
                        <p><i class="fas fa-users"></i> 1023</p>
                    </div>
                    <div class="card">
                        <h3>Most Popular Content</h3>
                        <p><i class="fas fa-chart-line"></i> Blog Title</p>
                    </div>
                </div>
                <div class="analytics">
                    <div class="analytics-chart">
                        <h3>User Engagement</h3>
                        <canvas id="engagementChart"></canvas>
                    </div>
                    <div class="analytics-chart">
                        <h3>Content Popularity</h3>
                        <canvas id="contentChart"></canvas>
                    </div>
                </div>
                <div class="recent-activity">
                    <h3>Recent Activity</h3>
                    <div class="recent-items">
                        <div class="recent-item">
                            <h4>Latest Registered Users</h4>
                            <ul>
                               @foreach ($latestUsers as $user)
                                    <li>
                                       @if ($user->photo)
                                       <img src="{{asset('storage/' . $user->photo)}}" alt="" width="30px" height="30px">
                                       @else
                                       <img src="https://via.placeholder.com/30" alt="No Photo">
                                       @endif
                                        {{$user->name}}
                                    </li>
                              @endforeach

                            </ul>
                        </div>
                        <div class="recent-item">
                            <h4>Latest Blog Posts</h4>
                            <ul>
                                @foreach ($latestBlogs as $blog)
                                    <li>{{$blog->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="recent-item">
                            <h4>Latest Videos</h4>
                            <ul>
                                @foreach ($latestVideos as $video)
                                    <li>{{$video->caption}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Player List Content -->
            <div id="playerListContent" style="display: none;">
                <x-player-list-table :players="$players" />
            </div>
            <div id="blogListContent" style="display: none;">
                <x-blog-list-table :blogs="$blogs" />
            </div>
            <div id="videoListContent" style="display: none;">
                <x-video-list-table :videos="$videos" />
            </div>
            <div id="teamListContent" style="display: none;">
                <x-team-list-table :teams="$teams" />
            </div>
            <div id="userListContent" style="display: none;">
                <x-user-list-table :users="$users" />
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //dashboard hunburgar
    const toggleBtn = document.querySelector('.toggle-sidebar-btn');
    const sidebar = document.querySelector('.sidebar');
    
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
    </script>
</div>
@endsection

