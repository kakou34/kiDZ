<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    function gameCategory(){
        return $this->belongsTo('App\GameCategory','category_id');
    }

    function game_images(){
        return $this->hasMany('App\GameImage');
    }

    function scopeCategoryGames($query, $category_id){
        return $query->where('category_id', $category_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    function scopeNewCategoryGames($query, $category_id){
        return $query->where('category_id', $category_id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

}
