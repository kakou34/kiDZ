@extends('layouts.app')

@section('title')
    Jeux de {{$subject->name}}
@endsection

@section('content')
    <!-- title -->
    <div class="padding">
        <div class="container pt-3">
            <div class="row ">
                <div class="col-md-12 section-title">
                    <h2 class="section-title">Nos Leçons De {{$subject->name}}</h2>
                    <div class="liner"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newest videos DIY -->
    <div class="padding elements-sec">
        <div class="container pt-3 new-items" id="new-courses-sec">
            <h1 id="items-title">Nouveauté!</h1>
            <div class="row">

                @if(count($newCourses)>0)
                    <div class="col-lg-6">
                        <div class="card item-cont newest-item course-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('coursePage', ['course_id'=> $newCourses[0]->id])}}">
                                <div class="card-body">
                                    <img src="{{getYoutubeThumbnail($newCourses[0]->video_link)}}" alt="course pic">
                                </div>
                                <div class="card-header">
                                    <h4 class="item-title">{{ $newCourses[0]->name}}</h4>
                                    <p class="item-date">{{ $newCourses[0]->updated_at}}</p>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="row other-elements">
                            @foreach($newCourses as $key=> $course)
                                @if($key>0)
                                    <div class="col-lg-6 element">
                                        <div class="card item-cont course-item" onmouseenter="playPaperAudio()">
                                            <a href="{{route('coursePage', ['course_id'=> $course->id])}}">
                                                <div class="card-body">
                                                    <img src="{{getYoutubeThumbnail($course->video_link)}}" alt="photo">
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="item-title">{{$course->name}}</h4>
                                                    <p class="item-date">{{$course->updated_at}}</p>
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
        <div class="container all-items all-courses-sec">
            <h1 id="items-title">Toutes Les Leçons De {{$subject->name}}</h1>
            <div class="row other-elements">
                @foreach($courses as $course)
                    <div class="col-sm-6 col-lg-3 element">
                        <div class="card item-cont course-item" onmouseenter="playPaperAudio()">
                            <a href="{{route('coursePage', ['course_id'=> $course->id])}}">
                                <div class="card-body">
                                    <img src="{{getYoutubeThumbnail($course->video_link)}}" alt="photo">
                                </div>
                                <div class="card-header">
                                    <h4 class="item-title">{{$course->name}}</h4>
                                    <p class="item-date">{{$course->updated_at}}</p>
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
                <img src="{{asset('/img/kidslearn.png')}}" alt="kids play" >
            </div>

        </div>
    </div>
@endsection


