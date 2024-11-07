<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('team')->paginate(4); // Adjust pagination number as needed
        return view('players.index', compact('players'));
    }

    public function show($id)
    {
        $player = Player::with('team')->findOrFail($id);
        return view('players.show', compact('player'));
    }
}
