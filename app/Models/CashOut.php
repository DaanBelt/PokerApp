<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{
    protected $fillable = ['player_session_id', 'amount'];

    public function PlayerSession() 
    {
        $this->belongsTo(PlayerSession::class);
    }
}
