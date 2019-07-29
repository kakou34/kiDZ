<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleImage;
use Illuminate\Http\Request;
use App\Http\Requests;

class CmsReadController extends Controller
{
    public function loadPage(){
        $articles = Article::all();
        return view('CMS.cmsread', [
            'articles' => $articles,
        ]);
    }

    public function postArticle(Request $request)
    {
        $this->validate($request, [
            'articleName'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'content'=>'required'
        ]);
        //array to store all images belonging to this article
        $article_images = array();
        $content=$request->input('content');
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
            //add image_name to the article_images array
            array_push($article_images,$image_name);
        }
        //uploading the image
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('upload'), $imageName);
        //add the article cover photo to the article_images array
        array_push($article_images, "/upload/".$imageName);
        $article = new Article();
        $article->name = request('articleName');
        $article->image_src = "/upload/".$imageName;
        //store article content from the editor as html code
        $article->content = $content;
        $article->save();
        //adding images of the current article to the database
        foreach ($article_images as $image){
            $artImg = new ArticleImage();
            $artImg->image_name = $image;
            $artImg->article_id = $article->id;
            $artImg->save();
        }
        return back();
    }

    public function deleteArticle($articleID) {
        //deleting old pictures belonging to this article
        foreach (ArticleImage::articleImages($articleID) as $image){
            $path = public_path().$image->image_name;
            unlink($path);
            $image->delete();
        }
        $result = Article::destroy($articleID);
        return back();
    }


    public function getSummernote()

    {

        return view('summernote');

    }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function postSummernote(Request $request)

    {
        // $this->validate($request, [
            
        //     'content' => 'required',
        
        // ]);
            
        $detail=$request->input('content');
        
        $dom = new \DomDocument();
        //dd($request);
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
       // dd($dom);

        $images = $dom->getElementsByTagName('img');
        //dd($images);
        foreach($images as $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $detail = $dom->saveHTML();
        dd($detail);
    }
}
