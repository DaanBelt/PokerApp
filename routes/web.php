<?php

use Illuminate\Support\Facades\Route;
use App\Models\GameSession;
use App\Models\Player;
use App\Models\PlayerSession;
use App\Models\BuyIn;
use App\Models\CashOut;
use App\http\Requests\StoreBuyInRequest;
use App\http\Requests\StoreCashOutRequest;
use App\http\Controllers\GameSessionController;
use App\http\Controllers\BuyInController;
use App\http\Controllers\CashOutController;

Route::get('/', [GameSessionController::class, 'index']);

Route::post('/sessions', [GameSessionController::class, 'store']);

Route::get('/sessions/{session}', [GameSessionController::class, 'show']);

Route::post('/addplayer/{session}', [PlayerSessionController::class, 'store']);

//Buyin
Route::post('/buyin/{session}', [BuyInController::class, 'store']);

//Cashout 
Route::post('/cashout/{session}', [CashOutController::class, 'store']);