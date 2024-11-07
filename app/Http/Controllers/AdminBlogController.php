<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function create(){
        return view('admin.blogs.create');
    }

    public function store(Request $request){
        $formData = $request->validate([
           'title' => 'required|string|max:255',
            'author' => 'required|string|max:50',
            'intro' => 'required|string|max:150',
            'body' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

        $formData = $request->only(['title','author','intro', 'body']);
        $formData['photos'] = [];
      

        // Handle multiple photo uploads
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPath = $photo->store('photos', 'public');
                $formData['photos'][] = $photoPath;
            }
        }


        try {
            Blog::create([
                'title' => $formData['title'],
                'author' => $formData['author'],
                'intro' => $formData['intro'],
                'body' => $formData['body'],
                'photos' => json_encode($formData['photos']) // store photos as string using json_encode. 
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'Blog created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.blogs.create')->with('error', 'Failed to create blog: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $formData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'intro' => 'required|string|max:255',
            'body' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $blog = Blog::findOrFail($id);
    
        // Retrieve existing photos from the database
        $existingPhotos = json_decode($blog->photos, true) ?? [];
    
        // Handle deletion of existing photos
        if ($request->has('existing_photos')) {
            $deletedPhotos = array_diff($existingPhotos, $request->input('existing_photos'));
            
            foreach ($deletedPhotos as $photo) {
                if (Storage::disk('public')->exists($photo)) {
                    Storage::disk('public')->delete($photo);
                }
            }
    
            // Update the existing photos list to keep only those not deleted
            $existingPhotos = array_intersect($existingPhotos, $request->input('existing_photos'));
        }
    
        // Handle new photo uploads
        $newPhotos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPath = $photo->store('photos', 'public');
                $newPhotos[] = $photoPath;
            }
        }
    
        // Combine existing photos with new ones
        $allPhotos = array_merge($existingPhotos, $newPhotos);
    
        try {
            $blog->update([
                'title' => $formData['title'],
                'author' => $formData['author'],
                'intro' => $formData['intro'],
                'body' => $formData['body'],
                'photos' => json_encode($allPhotos),
            ]);
    
            return redirect()->route('admin.dashboard')->with('success', 'Blog updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.blogs.edit', $id)->with('error', 'Failed to update blog: ' . $e->getMessage());
        }
    }
    
    

    public function destroy($id){
        try {
            $blog = Blog::findOrFail($id);
    
            // Decode existing photos from JSON
            $photos = json_decode($blog->photos, true) ?? [];
    
            // Delete photos from storage
            foreach ($photos as $photo) {
                $photoPath = storage_path('app/public/' . $photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
    
            // Delete the blog entry
            $blog->delete();
    
            return redirect()->route('admin.dashboard')->with('success', 'Blog deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Failed to delete blog: ' . $e->getMessage());
        }

    }
    

}

