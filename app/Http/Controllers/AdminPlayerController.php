<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPlayerController extends Controller
{
    public function create(){
        $teams = Team::all();
        return view('admin.players.create', compact('teams'));
    }

    public function store(Request $request){
        $formData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'back_number'=>'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'position' => 'required|string|max:255',
            'dominant_foot' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'rating' => 'required|integer|min:1|max:10',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('profile_photo')){
            $profilePhotoPath = $request->file('profile_photo')->store('players/profile_photos','public');
            $formData['profile_photo'] = $profilePhotoPath;
        }

        if($request->hasFile('cover_photo')){
            $coverPhotoPath = $request->file('cover_photo')->store('players/cover_photos','public');
            $formData['cover_photo'] = $coverPhotoPath;
        }
        

        try {
            Player::create($formData);
            return redirect()->route('admin.dashboard')->with('success', 'Player added successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.players.create')->with('error', 'Failed to add player: ' . $e->getMessage());
        }
    }

    public function edit(Player $player){
        $teams = Team::all();
        return view('admin.players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $formData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'back_number'=>'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'position' => 'required|string|max:255',
            'dominant_foot' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'rating' => 'required|integer|min:1|max:10',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile photo update
        if ($request->hasFile('profile_photo')) {
            $oldProfilePhoto = $player->profile_photo;
            if ($oldProfilePhoto && Storage::disk('public')->exists($oldProfilePhoto)) {
                Storage::disk('public')->delete($oldProfilePhoto);
            }
            $profilePhotoPath = $request->file('profile_photo')->store('players/profile_photos', 'public');
            $formData['profile_photo'] = $profilePhotoPath;
        } else {
            $formData['profile_photo'] = $player->profile_photo;
        }

        // Handle cover photo update
        if ($request->hasFile('cover_photo')) {
            $oldCoverPhoto = $player->cover_photo;
            if ($oldCoverPhoto && Storage::disk('public')->exists($oldCoverPhoto)) {
                Storage::disk('public')->delete($oldCoverPhoto);
            }
            $coverPhotoPath = $request->file('cover_photo')->store('players/cover_photos', 'public');
            $formData['cover_photo'] = $coverPhotoPath;
        } else {
            $formData['cover_photo'] = $player->cover_photo;
        }

        $player->update($formData);
        return redirect()->route('admin.dashboard')->with('success', 'Player updated successfully');
    }

    public function destroy(Player $player){
        // Delete profile and cover photos from storage
        if ($player->profile_photo && Storage::disk('public')->exists($player->profile_photo)) {
            Storage::disk('public')->delete($player->profile_photo);
        }

        if ($player->cover_photo && Storage::disk('public')->exists($player->cover_photo)) {
            Storage::disk('public')->delete($player->cover_photo);
        }

        $player->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Player deleted successfully');
    }
}
