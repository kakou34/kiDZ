@extends('layouts.app')
@section('title', 'Je lis')
@section('content')
    <!-- title -->
    <div class="padding">
        <div class="container pt-3">
            <div class="row ">
                <div class="col-md-12 section-title">
                    <h2 class="section-title">Nos Articles</h2>
                    <div class="liner"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newest articles -->
    <div class="padding  elements-sec">
        <div class="container pt-3 new-items" id="new-articles-sec">
            <h1 id="items-title">Nouveauté!</h1>
            <div class="row">

                @if(count($newestArticles)>0)
                    <div class="col-lg-6">
                        <div class="card item-cont newest-item article-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('articlePage', ['article_id'=> $newestArticles[0]->id])}}">
                            <div class="card-body">
                                <img src="{{asset($newestArticles[0]->image_src)}}" alt="article photo">
                            </div>
                            <div class="card-header">
                                <h4 class="item-title">{{$newestArticles[0]->name}}</h4>
                                <p class="item-date">{{$newestArticles[0]->updated_at}}</p>
                            </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="row other-elements">
                            @foreach($newestArticles as $key=> $article)
                                @if($key>0)
                                    <div class="col-lg-6 element">
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif()
            </div>
        </div>
    </div>

    <!-- All articles -->
    <div class="padding ">
        <div class="container all-items all-articles-sec">
            <h1 id="items-title">Tous Les Articles</h1>
            <div class="row other-elements elements-sec">
                @foreach($articles as $article)
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


    <div class="container end">
        <div class="row ">
            <div class="col-md-12 text-center">
                <img src="{{asset('/img/kidsread.png')}}" alt="kids read" >
            </div>

        </div>
    </div>

@endsection


