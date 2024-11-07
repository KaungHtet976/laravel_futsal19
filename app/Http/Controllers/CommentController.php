<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog){
        $request->validate([
            'content'=>'required',
        ]);

        $blog->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Comment added!');
    }

    public function destroy(Comment $comment){
       if($comment->user_id !== Auth::id()){
        abort(404);
       }

       $comment->delete();
       return back()->with('success', 'Comment deleted!');
    }

    public function edit(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403); // Unauthorized
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403); // Unauthorized
        }

        $request->validate([
            'content' => 'required',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->route('blogs.show', $comment->blog_id)->with('success', 'Comment updated!');
    }
}
