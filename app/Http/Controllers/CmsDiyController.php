<?php

namespace App\Http\Controllers;

use App\DiyVideo;
use Illuminate\Http\Request;

class CmsDiyController extends Controller
{
    public function loadPage(){
        $videos = DiyVideo::all();
        return view('CMS.cmsdiy', [
            'videos' => $videos,
        ]);
    }
    //function to add a new DIY video to the DB
    public function storeDiy() {
        $data = request()->validate ([
            'videoName'=>'required',
            'videoLink'=>'required'
        ]);
        $id = getYoutubeID(request('videoLink'));
        $diy = new DiyVideo();
        $diy->name = request('videoName');
        $diy->link = $id;
        $diy->save();
        return back();
    }

    //funtion to delete an existing DIY video from the database
    public function deleteDiy($videoID) {
        $result = DiyVideo::destroy($videoID);
        return back();
    }
}
