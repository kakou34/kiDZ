<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleImage;
use Illuminate\Http\Request;

class EditArticleController extends Controller
{
    function loadEdition($articleID) {
        $article = Article::find($articleID);
        return view('CMS.editArticle', compact( 'article'));
    }


    function editArticle($articleID, Request $request) {
        $this->validate($request, [
            'articleName'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'content'=>'required'
        ]);
        //deleting old pictures belonging to this article
        foreach (ArticleImage::articleImages($articleID) as $image){
            if($image->image_name != Article::find($articleID)->image_src) {
                $path = public_path() . $image->image_name;
                unlink($path);
                $image->delete();
            }
        }
        //array to store all images belonging to this article after modification
        $article_images = array();
        $content=$request->input('content');
        if ($request->input('imageOp') == 'yes') {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload'), $imageName);
            //add the article's new cover photo to the article_images array
            array_push($article_images, "/upload/".$imageName);
            //deleting the old cover photo from the database
            foreach (ArticleImage::articleImages($articleID) as $image){
                $path = public_path() . $image->image_name;
                unlink($path);
                $image->delete();
            }
            Article::where('id', $articleID)->update([ 'image_src' => "/upload/".$imageName ]);
        }
        $dom = new \DomDocument();
        $dom->loadHtml('<?xml encoding="UTF-8">'.$content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', "$data;");
            list(, $data)      = explode(',', "$data,");
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
            array_push($article_images,$image_name);
        }
        //storing the article's new photos to the ArticleImages table
        foreach ($article_images as $image){
            $artImg = new ArticleImage();
            $artImg->image_name = $image;
            $artImg->article_id = $articleID;
            $artImg->save();
        }
        Article::where('id', $articleID)
                    ->update(['name' => $request->input('articleName'),
                              'content' => $content]);
        return redirect('cmsread');
    }

    //function to append image edition field when the radio is checked
    function editImage(){
        return view('CMS.imageEdit');
    }
}
