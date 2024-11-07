<div class="topbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="topbar-left">
           
            
        </div>

        <div class="topbar-right">

            @if (Auth::check())
                <div class="user-photo-container" id="user-photo-container">
                    @if (Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Photo" class="user-photo">
                @else
                    <!-- Show first letter of user's name -->
                    <div class="user-initial">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                </div>
                <div class="user-dropdown-box" id="user-dropdown-box">
                    <ul> 
                        @if(Auth::user()->role === 'admin')
                            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-cog me-2"></i> Admin Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('profile.index') }}"><i class="fas fa-user-alt me-2"></i> My Profile</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="fas fa-power-off me-2"></i> Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{route('register')}}" class="me-3"><small><i class="fa fa-user text-primary me-2"></i>Register</small></a>
                <a href="{{route('login')}}" class="me-3"><small><i class="fa fa-sign-in-alt text-primary me-2"></i>Login</small></a>
            @endif
        </div>
    </div>
</div>
<!-- Topbar End -->
