@extends('layouts.app')

@section('title')
    {{$game->name}}
@endsection

@section('content')
    <div class="padding ">
        <div class="container game-cont mt-2 mb-2" >
            <h1 id="items-title">{{$game->name}}</h1>
            <div class="frameContainer">
                <iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        frameborder="0"
                        src="{{$game->game_link}}" >
                </iframe>
            </div>
            <div style="background-color: rgba(255,255,255,0.3); border-radius: 10px;" class="elements-sec">
            <h1 id="items-title" class="mt-4">Essayez aussi...</h1>
            <div class="row ">
                @foreach($suggestions as $game)
                    <div class="col-sm-6 col-lg-3 element">
                        <div class="card item-cont game-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('gamePage', ['game_id'=> $game->id])}}">
                                <div class="card-body">
                                    <img src="{{asset($game->game_image)}}" alt="photo">
                                </div>
                                <div class="card-header">
                                    <h4 class="item-title">{{$game->name}}</h4>
                                    <p class="item-date">{{$game->updated_at}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection