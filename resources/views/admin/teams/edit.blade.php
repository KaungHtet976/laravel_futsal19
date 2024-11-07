{{-- resources/views/admin/teams/edit.blade.php --}}

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Edit Team</h3>
            <div class="card p-4 my-3 shadow-sm">
                 <form action="{{ route('admin.teams.update', ['team' => $team->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="teamName" class="form-label">Team Name</label>
                        <input 
                            required
                            type="text" 
                            name="name" 
                            class="form-control" 
                            id="teamName" 
                            value="{{ old('name', $team->name) }}"
                        >
                        <x-error name="name"/>
                    </div>
                    <div class="mb-3">
                        <label for="coachName" class="form-label">Coach Name</label>
                        <input 
                            required
                            type="text" 
                            name="coach" 
                            class="form-control" 
                            id="coachName"
                            value="{{ old('coach', $team->coach) }}"
                        >
                        <x-error name="coach"/>
                    </div>     
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
