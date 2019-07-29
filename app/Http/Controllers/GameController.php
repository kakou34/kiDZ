<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //function to load a game page according to the game id passed to the route
    function gamePage($id) {
        $game = Game::find($id);
        $suggestions = Game::where('category_id', $game->gameCategory->id)
            ->where('id','<>', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();
        return view('game', compact('game', 'suggestions'));
    }
}
