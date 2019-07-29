<?php

namespace App\Http\Controllers;

use App\GameCategory;
use App\Game;
use App\GameImage;
use Illuminate\Http\Request;

class CmsPlayController extends Controller
{
    //function to upload a list of all available categories
    public function categoryList() {
        $categories = GameCategory::all();
        return view('CMS.cmsplay', [
            'categories' => $categories,
        ]);

    }

    //add a new game category to the db
    public function storeGameCategory() {

        $data = request()->validate([
            'categoryName'=> 'required'
        ]);

        $category = new GameCategory();
        $category->name = request('categoryName');
        $category->save();

        return back();

    }

    //store a new game
    public function storeGame() {
        $data = request()->validate([
            'gameName'=> 'required',
            'gameLink'=> 'required',
            'categoryId'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //uploading the image
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('upload'), $imageName);

        $game = new Game();
        $game->name = request('gameName');
        $game->category_id = request('categoryId');
        $game->game_link = \request('gameLink');
        $game->game_image = "/upload/".$imageName;
        $game->save();

        //adding the image to the database
        $gameImg = new GameImage();
        $gameImg->image_name = "/upload/".$imageName;
        $gameImg->game_id = $game->id;
        $gameImg->save();
        return back();

    }

    public function fetchLists() {
        $categories = GameCategory::all();
        return view('CMS.cmsplay', compact('categories'));
    }

    public function deleteGame($gameID) {
        $game = Game::find($gameID);
        //deleting old pictures belonging to this game
        foreach ($game->game_images as $image){
            $path = public_path().$image->image_name;
            unlink($path);
            $image->delete();
        }
        $result = Game::destroy($gameID);
        return back();
    }

    public function searchGames($category_id){
        $games = Game::categoryGames($category_id);
        return view('CMS.searchTableGames', compact( 'games'));

    }

    public function deleteGameCategory($categoryID) {
        $result = GameCategory::destroy($categoryID);
        return back();
    }
}
