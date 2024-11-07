@extends('layouts.app')
@section('content')
<div class="container section-top-space">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Add Team</h3>
            <div class="form-card p-4 my-3 shadow-sm">
                <form action="{{ route('admin.teams.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="teamName" class="form-label">Team Name</label>
                        <input 
                            required
                            type="text" 
                            name="name" 
                            class="form-control" 
                            id="teamName" 
                            aria-describedby="teamNameHelp"
                            value="{{ old('name') }}"
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
                            aria-describedby="coachNameHelp"
                            value="{{ old('coach') }}"
                        >
                        <x-error name="coach"/>
                    </div>     
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
