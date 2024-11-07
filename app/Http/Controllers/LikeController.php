<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Blog $blog){

         // Check if the user has already liked the blog to avoid duplicate likes
        $alreadyLiked =  $blog->likes()->where('user_id',Auth::id())->exists();
       if(!$alreadyLiked){
        
            $blog->likes()->create([
            'user_id'=> Auth::id(),
        ]);
       }
       

        $likeCount = $blog->likes()->count();

       return response()->json([
            'isLiked' => true,
            'likes' => $likeCount
       ]);
    }

    public function unlike(Blog $blog){

        //Ensure the Like by the user exists before attempting to delete
        $userLike = $blog->likes()->where('user_id',Auth::id());

        if($userLike->exists()){
            $userLike->delete();
        }
       
        $likeCount = $blog->likes()->count();

        return response()->json([
            'isLiked' => false,
            'likes' => $likeCount
        ]);
    }
}
