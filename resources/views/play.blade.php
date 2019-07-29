@extends('layouts.app')

@section('title')
Jeux de {{$category->name}}
@endsection

@section('content')
    <!-- title -->
    <div class="padding">
        <div class="container pt-3">
            <div class="row ">
                <div class="col-md-12 section-title">
                    <h2 class="section-title">Nos Jeux De {{$category->name}}</h2>
                    <div class="liner"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newest videos DIY -->
    <div class="padding elements-sec">
        <div class="container pt-3 new-items" id="new-games-sec">
            <h1 id="items-title">Nouveauté!</h1>
            <div class="row">

                @if(count($newGames)>0)
                    <div class="col-lg-6">
                        <div class="card item-cont newest-item game-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('gamePage', ['game_id'=> $newGames[0]->id])}}">
                                <div class="card-body">
                                    <img src="{{asset($newGames[0]->game_image)}}" alt="photo">
                                </div>
                                <div class="card-header">
                                    <h4 class="item-title">{{ $newGames[0]->name}}</h4>
                                    <p class="item-date">{{ $newGames[0]->updated_at}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row other-elements">
                            @foreach($newGames as $key=> $game)
                                @if($key>0)
                                    <div class="col-lg-6 element">
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
                                @endif
                            @endforeach
                        </div>
                    </div>

                @endif()
            </div>
        </div>
    </div>

    <!-- All videos -->
    <div class="padding  elements-sec">
        <div class="container all-items all-games-sec">
            <h1 id="items-title">Tous Les Jeux De {{$category->name}}</h1>
            <div class="row other-elements">
                @foreach($games as $game)
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

    <div class="container end">
        <div class="row ">
            <div class="col-md-12 text-center">
                <img src="{{asset('/img/kidsplay.png')}}" alt="kids play" >
            </div>
        </div>
    </div>
@endsection


