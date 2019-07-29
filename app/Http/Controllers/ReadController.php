<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function fetchLists() {
        $articles = Article::all();
        $newestArticles = Article::take(5)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('read', compact('articles', 'newestArticles'));
    }
}
