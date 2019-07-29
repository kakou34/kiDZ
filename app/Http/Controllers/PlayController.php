<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCategory;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    function categoryPage($category_id) {
        $category = GameCategory::find($category_id);
        $games = Game::categoryGames($category_id);
        $newGames = Game::newCategoryGames($category_id);
        return view( 'play', compact('category', 'games', 'newGames'));
    }
}
