@extends('layouts.app')

@section('title', 'DIY')


   @section('content')
      <!-- title -->
      <div class="padding">
        <div class="container pt-3">
            <div class="row ">
                <div class="col-md-12 section-title">
                    <h2 class="section-title">Nos Vidéos DIY</h2>
                    <div class="liner"></div>
                </div>
            </div>
        </div>
    </div>
      <!-- Newest videos DIY -->
      <div class="padding elements-sec">
        <div class="container pt-3 new-items" id="new-diy-sec">
            <h1 id="items-title">Nouveauté!</h1>
            <div class="row">

                @if(count($newestVideos)>0)
                    <div class="col-lg-6">
                        <div class="card item-cont newest-item diy-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('diyVideoPage', ['video_id'=>  $newestVideos[0]->id])}}">
                                <div class="card-body">
                                    <img src="{{getYoutubeThumbnail( $newestVideos[0]->link)}}" alt="photo">
                                </div>
                                <div class="card-header">
                                    <h4 class="item-title">{{ $newestVideos[0]->name}}</h4>
                                    <p class="item-date">{{ $newestVideos[0]->updated_at}}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    </a>

                    <div class="col-lg-6">
                        <div class="row other-elements">
                            @foreach($newestVideos as $key=> $video)
                                @if($key>0)
                                    <div class="col-lg-6 element">
                                        <div class="card item-cont diy-item" onmouseenter="playPaperAudio()">
                                            <a href="{{route('diyVideoPage', ['video_id'=> $video->id])}}">
                                                <div class="card-body">
                                                    <img src="{{getYoutubeThumbnail($video->link)}}" alt="photo">
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="item-title">{{$video->name}}</h4>
                                                    <p class="item-date">{{$video->updated_at}}</p>
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
        <div class="container all-items all-diy-sec">
            <h1 id="items-title">Toutes Les Vidéos</h1>
            <div class="row other-elements">
                @foreach($videos as $video)
                    <div class="col-sm-6 col-lg-3 element">
                        <div class="card item-cont diy-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('diyVideoPage', ['video_id'=> $video->id])}}">
                                <div class="card-body">
                                    <img src="{{getYoutubeThumbnail($video->link)}}" alt="photo">
                                </div>
                                <div class="card-header">
                                    <h4 class="item-title">{{$video->name}}</h4>
                                    <p class="item-date">{{$video->updated_at}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
      <!-- Ending Image -->
      <div class="container end">
        <div class="row ">
            <div class="col-md-12 text-center">
                <img src="{{asset('/img/kidsdiy.jpg')}}" alt="kids diy" >
            </div>

        </div>
    </div>
   @endsection


