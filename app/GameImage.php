<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameImage extends Model
{
    function game(){
        return $this->belongsTo('App\Game','game_id');
    }
}
