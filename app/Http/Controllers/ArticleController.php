<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //function to show an article in its detail page
    function loadArticle($article_id){
        $article = Article::find($article_id);
        $suggestions = Article::where('id','<>', $article_id)
            ->inRandomOrder()
            ->take(4)
            ->get();
        return view('article', compact('article', 'suggestions'));
    }
}
