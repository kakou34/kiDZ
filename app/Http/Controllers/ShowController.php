<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    function showPage($show_id){
        $show = Show::find($show_id);
        return view('show', compact('show'));
    }
}
