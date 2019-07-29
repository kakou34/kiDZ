<?php

namespace App\Http\Controllers;


use App\DiyVideo;
use Illuminate\Http\Request;

class DiyController extends Controller
{
    public function fetchLists() {
        $videos = DiyVideo::all();
        $newestVideos = DiyVideo::take(5)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('diy', compact('videos', 'newestVideos'));
    }
}
