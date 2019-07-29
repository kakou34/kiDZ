<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    function article(){
        return $this->belongsTo('App\Article','article_id');
    }

    //function to get all images related to a specific article
    function scopeArticleImages($query, $article_id){
        return $query->where('article_id', $article_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
