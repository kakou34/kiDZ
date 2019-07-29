<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use App\Episode;

class WatchController extends Controller
{
    function loadPageWatch(){
        $episodes = Episode::lastAddedEpisodes();
        $newShows = Show::lastAddedShows();
        $shows = Show::all();
        return view('watch', compact('episodes', 'newShows', 'shows'));
    }
}
