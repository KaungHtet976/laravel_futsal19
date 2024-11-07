@extends('layouts.app')

@section('content')
<div class="container section-top-space">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h3 class="text-primary text-center my-2">Register</h3>
            <div class="form-card p-4 my-3 shadow-sm">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-control" 
                            value="{{ old('name') }}" 
                            required
                        >
                        <x-error name="name"/>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input 
                            type="text" 
                            name="username" 
                            id="username" 
                            class="form-control" 
                            value="{{ old('username') }}" 
                            required
                        >
                        <x-error name="username"/>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-control" 
                            value="{{ old('email') }}" 
                            required
                        >
                        <x-error name="email"/>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-control" 
                            required
                        >
                        <x-error name="password"/>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Profile Photo (Optional)</label>
                        <input 
                            type="file" 
                            name="photo" 
                            id="photo" 
                            class="form-control"
                        >
                        <x-error name="photo"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
