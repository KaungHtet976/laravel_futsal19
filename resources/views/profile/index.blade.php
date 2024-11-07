@extends('layouts.app')

@section('content')
<div class="container section-top-space">
    <h2>Profile</h2>
    <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('path/to/default/image.jpg') }}" alt="Profile Photo" class="img-thumbnail" width="100">

    <p>Name: {{ auth()->user()->name }}</p>
    <p>Email: {{ auth()->user()->email }}</p>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

    <form action="{{ route('profile.changePassword') }}" method="POST" class="mt-3">
        @csrf
        <h4>Change Password</h4>
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Change Password</button>
    </form>
</div>
@endsection
