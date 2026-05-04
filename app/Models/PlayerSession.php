<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerSession extends Model
{
    protected $fillable = ['player_id', 'game_session_id'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function BuyIns()
    {
        return $this->hasMany(BuyIn::class);
    }

    public function CashOuts()
    {
        return $this->hasMany(CashOut::class);
    }
}
