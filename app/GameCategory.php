<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    function games(){
        return $this->hasMany('App\Game');
    }

}
