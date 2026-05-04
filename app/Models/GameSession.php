<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    protected $fillable = ['name', 'started_at'];

    public function playerSessions()
    {
        return $this->hasMany(PlayerSession::class);
    }
}
