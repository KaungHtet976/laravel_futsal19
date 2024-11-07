<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    public function create(){
        // Return view for video creation
        return view('admin.videos.create');
    }

    public function store(Request $request){
        // Store a new video
        $video = new Video();
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->video = $request->file('video')->store('videos', 'public');
        $video->save();

        return redirect()->route('admin.videos.index')->with('success', 'Video created successfully.');
    }

    // Method to show the form for editing an existing video
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    // Method to update the video data
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->caption = $request->input('caption');
        
        
        if ($request->hasFile('video')) {
            // Delete the old video file
            Storage::disk('public')->delete($video->video);
            
            // Store the new video file
            $video->video = $request->file('video')->store('videos', 'public');
        }
        
        $video->save();

        return redirect()->route('admin.dashboard')->with('success', 'Video updated successfully.');
    }

    // Method to delete a video
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Delete the video file
        Storage::disk('public')->delete($video->video);

        // Delete the video record from the database
        $video->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Video deleted successfully.');
    }
}
