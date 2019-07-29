<?php

namespace App\Http\Controllers;

use App\DiyVideo;
use App\Episode;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function diyVideoPage($id){
        $video = DiyVideo::find($id);
        $suggestions = DiyVideo::where('id','<>', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();
        //to tell the view whether it is recieving a DIY video
        $videoType = 0;
        return view('video', compact('video', 'suggestions', 'videoType'));
    }
    function episodeVideoPage($id) {
        $video = Episode::find($id);
        $suggestions = Episode::where('show_id', $video->show->id)
            ->where('id','<>', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();
        //to tell the view whether it is recieving an episode
        $videoType = 1;
        return view('video', compact('video','suggestions', 'videoType'));
    }
}
