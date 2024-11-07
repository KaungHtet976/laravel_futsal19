<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    public function create(){
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|max:255',
            'coach' => 'nullable|max:255',
        ]);

        Team::create($formData);

        return redirect()->route('admin.dashboard')->with('success', 'Team added successfully');
    }

    public function edit(Team $team){
       // dd($team);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team){
        $formData = $request->validate([
            'name' => 'required|max:255',
            'coach' => 'required|max:255',
        ]);

        $team->update($formData);
        return redirect()->route('admin.dashboard')->with('success', 'Team updated successfully');

    }

    public function destroy(Team $team){
        $team->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Team deleted successfully');

    }

}
