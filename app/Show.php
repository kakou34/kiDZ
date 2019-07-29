<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|Request|string name
 * @property array|Request|string id
 */
class Show extends Model
{
    function episodes(){
        return $this->hasMany('App\Episode');
    }

    function scopeLastAddedShows($query){
        return $query->take(5)
                     ->orderBy('created_at', 'desc')
                     ->get();
    }

    function newEpisodes() {
        $episodes = Episode::where('show_id', $this->id)
            ->take(4)
            ->orderBy('created_at', 'desc')
            ->get();
        return $episodes;
    }
}
