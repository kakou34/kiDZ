<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * @property array|Request|string name
 * @property array|Request|string show_id
 * @property array|Request|string link
 */
class Episode extends Model
{
    function show(){
        return $this->belongsTo('App\Show');
    }

    function scopeShowEps($query , $show_id){
        return $query->where('show_id', $show_id);
    }

    function scopeLastAddedEpisodes($query){
        return $query->take(5)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    function scopeNewShowEpisodes($query, $show_id){
        return $query->where('show_id', $show_id)
                     ->orderBy('created_at', 'desc')
                     ->take(4)
                     ->get();
    }
    function scopeShowEpisodes($query, $show_id){
         return $query->where('show_id', $show_id)
                ->orderBy('created_at', 'desc')
                ->get();
    }
}
