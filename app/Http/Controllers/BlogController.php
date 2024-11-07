<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function show($id){
        $blog = Blog::findOrFail($id);

         // Check if the current user has liked this blog
         $isLiked = false;
         if (Auth::check()) { // Ensure the user is logged in
             $user = Auth::user();
             $isLiked = $blog->likes()->where('user_id', $user->id)->exists();
         }

        return view('blogs.show',
        [
            'blog'=>$blog,
            'isLiked'=>$isLiked

        ]);
    }
}
