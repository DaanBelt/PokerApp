<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameSession;

class GameSessionController extends Controller
{
    public function index() 
    {
        $sessions = GameSession::all();

        return view('startpage', compact('sessions'));
    }

    public function store()
    {
        GameSession::create([
            'name' => request('name'),
            'started_at' => now()
        ]);

        return redirect('/sessions/' . $sessions->id);
    }

    public function show(GameSession $session)
    {
        return view('game-session', compact('session'));
    }
}
