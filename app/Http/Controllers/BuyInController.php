<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameSession;
use App\Models\Buyin;

class BuyInController extends Controller
{
    public function store(Request $request, GameSession $session)
    {
        $data = $request->validate([
            'player_session_id' => ['required', 'exists:player_sessions,id'],
            'amount' => ['required', 'numeric', 'min:0.01']
        ]);

        BuyIn::create([
            'player_session_id' => $data['player_session_id'],
            'amount' => $data['amount'],
        ]);

        return redirect('/sessions/' . $session->id);
    }
}
