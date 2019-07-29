<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    function article_images(){
        return $this->hasMany('App\ArticleImage');
    }
}
