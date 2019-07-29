<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Show;
use Illuminate\Http\Request;

class CmsWatchController extends Controller
{
    public function showList() {
        $shows = Show::all();
        return view('CMS.cmswatch', [
            'shows' => $shows,
        ]);

    }
    public function storeShow() {

        $data = request()->validate([
            'showName'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        //uploading the image
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('upload'), $imageName);

        $show = new Show();
        $show->name = request('showName');
        $show->image_src = "/upload/".$imageName;
        $show->save();

        return back();

    }

    public function storeEpisode() {

        $data = request()->validate([
            'epName'=> 'required',
            'epLink'=> 'required',
            'showId'=> 'required'
        ]);

        $id = getYoutubeID(request('epLink'));
        $episode = new Episode();
        $episode->name = request('epName');
        $episode->show_id = request('showId');
        if($id){
            $episode->link = $id;
        }
        $episode->save();

        return back();

    }

    public function fetchLists() {
        $shows = Show::all();
        return view('CMS.cmswatch', compact('shows'));
    }

    public function deleteEpisode($episodeID) {
        $result = Episode::destroy($episodeID);
        return back();
    }

    public function searchEpisodes($showTableId){
        return view('CMS.searchTableEps', compact( 'showTableId'));
    }

    public function deleteShow($showID) {
        $result = Show::destroy($showID);
        return back();
    }


}
