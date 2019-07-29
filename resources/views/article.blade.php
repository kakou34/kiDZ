@extends('layouts.app')
@section('title')
{{$article->name}}
@endsection
@section('content')
    <div class="padding ">
        <div class="container article-cont mt-2 mb-2" >
            <div class="article-title-element">
                    <img class="article-pic" src="{{asset($article->image_src)}}" alt="photo">
                    <span class="article-title " >{{$article->name}}</span>
            </div>
            <div class="article">
                {!!  $article->content!!}
            </div>


            <div style="background-color: rgba(255,255,255,0.3); border-radius: 10px;">
            <div class="article-title-element mt-4" style="margin-bottom: 0; height: auto">
                <span class="article-title " >Lisez aussi...</span>
            </div>
            <div class="row elements-sec">
            @foreach($suggestions as $article)
                <div class="col-sm-6 col-lg-3 element">
                    <a href="{{route('articlePage', ['article_id'=> $article->id])}}">
                        <div class="card item-cont article-item" onmouseenter="playPaperAudio()">
                            <div class="card-body">
                                <img src="{{asset($article->image_src)}}" alt="article photo">
                            </div>
                            <div class="card-header">
                                <h4 class="item-title">{{$article->name}}</h4>
                                <p class="item-date">{{$article->updated_at}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection









