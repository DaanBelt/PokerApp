<?php

use Illuminate\Support\Facades\Route;
use App\Models\GameSession;
use App\Models\Player;
use App\Models\PlayerSession;
use App\Models\BuyIn;
use App\Models\CashOut;

Route::get('/', function () {
    $sessions = GameSession::all();
    return view('startpage', compact('sessions'));
});

Route::post('/sessions', function() {
    $session = GameSession::create([
        'name' => request('name'),
        'started_at' => now()
    ]);

    return redirect('/sessions/' . $session->id);
}); 

Route::get('/sessions/{session}', function(GameSession $session){
    return view('game-session', compact('session'));
});

Route::post('/addplayer/{session}', function(GameSession $session){
    $player = Player::create([
        'display_name' => request('display_name')
    ]);
    
    $playerSession = PlayerSession::create([
        'player_id' => $player->id,
        'game_session_id' => $session->id
    ]);
    
    return redirect('/sessions/' . $session->id);
});

Route::post('/buyin/{session}', function(GameSession $session){
    $buyIn = BuyIn::create([
        'player_session_id' => request('player_session_id'),
        'amount' => request('amount')
    ]);

    return redirect('/sessions/' . $session->id);
});

Route::Post('/cashout/{session}', function(GameSession $session){
    $cashOut = CashOut::create([
        'player_session_id' => request('player_session_id'),
        'amount' => request('amount')
    ]);

    return redirect('/sessions/' . $session->id);
});