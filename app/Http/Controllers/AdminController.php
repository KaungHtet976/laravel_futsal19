<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $teams = Team::all(); // Fetch all teams from the database
        $players = Player::with('team')->get(); // Fetch all players from database with team relationship
        $blogs = Blog::all();
        $users = User::all();
        $videos = Video::all();

        // Fetch the latest 3 records for the dashboard panel
        $latestUsers = User::latest()->take(3)->get();   // Latest 3 users
        $latestBlogs = Blog::latest()->take(3)->get();   // Latest 3 blogs
        $latestVideos = Video::latest()->take(3)->get(); // Latest 3 videos

        $totalUsers = User::count();

        return view('admin.dashboard', compact(
            'teams', 
            'players',
            'blogs',
            'users',
            'videos', 
            'latestUsers',
            'latestBlogs',
            'latestVideos',
            'totalUsers'
        )); // Pass teams to the view
        
    }

   
}
