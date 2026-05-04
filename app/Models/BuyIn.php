<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyIn extends Model
{

    protected $fillable = ['player_session_id', 'amount', 'status'];

    public function PlayerSession()
    {
        $this->belongsTo(PlayerSession::class);
    }

}
