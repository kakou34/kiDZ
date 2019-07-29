@extends('layouts.app')
@section('title')
    {{$show->name}}
@endsection

@section('content')
    <!-- All episodes of this show -->
    <div class="padding  elements-sec">
        <div class="container all-items all-episodes-sec">
            <h1 id="items-title">Tous les épisodes de {{$show->name}}</h1>
            <div class="row other-elements">
                @foreach($show->episodes as $episode)
                    <div class="col-sm-6 col-lg-3 element">
                        <div class="card item-cont episode-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('episodeVideoPage', ['video_id'=> $episode->id])}}">
                                <div class="card-body">
                                    <img src="{{getYoutubeThumbnail($episode->link)}}" alt="photo">
                                </div>
                                <div class="card-header">
                                    <h4 class="item-title">{{$episode->name}}</h4>
                                    <p class="item-date">{{$episode->updated_at}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
