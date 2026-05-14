<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerSessionController extends Controller
{
    public function store(GameSession $session)
    {
        $player = Player::create([
            'display_name' => request('display_name'),
        ]);

        PlayerSession::create([
            'player_id' => $player->id,
            'game_session_id' => $session->id,
        ]);

        return redirect('/sessions/' . $session->id);
    }
}
    