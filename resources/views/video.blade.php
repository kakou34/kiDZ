@extends('layouts.app')

@section('title')
    {{$video->name}}
@endsection

@section('content')
    <div class="padding ">
        <div class="container video-cont mt-2 mb-2 " >
            <h1 id="items-title">{{$video->name}}</h1>
                <div class="frameContainer">
                    <iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            frameborder="0"
                            src="https://www.youtube.com/embed/{{$video->link}}">
                    </iframe>
                </div>

            <div style="background-color: rgba(255,255,255,0.3); border-radius: 10px;" class="elements-sec">
            <h1 class="mt-4" id="items-title">Regardez aussi...</h1>
            <div class="row  elements-sec">
                @foreach($suggestions as $episode)
                    <div class="col-sm-6 col-lg-3 element">
                        <div class="card item-cont episode-item" onmouseenter="playPaperAudio()">
                            <a href="@if($videoType==0)
                                    {{route('diyVideoPage', ['video_id'=> $episode->id])}}
                                     @elseif($videoType==1)
                                    {{route('episodeVideoPage', ['video_id'=> $episode->id])}}
                                     @endif">
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
    </div>
@endsection










