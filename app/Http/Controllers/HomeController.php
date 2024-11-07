<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Player;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){

        $users = User::all();
        $players = Player::inRandomOrder()->take(4)->get();
        $blogs = Blog::latest()->take(5)->get();
        $videos = Video::latest()->take(5)->get();
        return view('home',compact('blogs','players','users','videos'));
    }

}
