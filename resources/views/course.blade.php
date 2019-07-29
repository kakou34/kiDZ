@extends('layouts.app')

@section('title')
    {{$course->name}}
@endsection

@section('content')
    <div class="padding ">
        <div class="container course-video-cont mt-2 mb-2 text-center">
            <h1 id="items-title">{{$course->name}}</h1>
            <div class="frameContainer">
                <iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        frameborder="0"
                        src="https://www.youtube.com/embed/{{$course->video_link}}">
                </iframe>
            </div>
        </div>
    </div>

    @if(count($course->questions)>0)
    <div class="padding">
        <div class="container all-items questions-sec">
            <h1 class="text-center" id="items-title">Testez Vos Connaissances!</h1>
            <div class="row">
                @foreach($course->questions as $key => $question)
                    <div class="col-md-4" id="{{$question->id}}">
                        <div class="card my-2 question">
                            <div class="card-header">{{$question->question}}</div>
                            <div class="card-body">
                                <ul>
                                    <li><input type="radio" name="question{{$key}}"
                                               value="{{ $question->correct==1 ? '1' : '0'}}"
                                                class="op-radio"><span class="question-option">{{$question->option1}}</span></li>
                                    <li><input type="radio" name="question{{$key}}"
                                               value="{{ $question->correct==2 ? '1' : '0'}}"
                                                class="op-radio"><span class="question-option">{{$question->option2}}</span></li>
                                    <li><input type="radio" name="question{{$key}}"
                                               value="{{ $question->correct==3 ? '1' : '0'}}"
                                               class="op-radio"><span class="question-option">{{$question->option3}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center my-2 check">
                <button type="submit" class="btn btn-primary checkAnswers">
                    Vérifier
                </button>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('script')
    <script>
        $(document).on('click', '.checkAnswers', function(){
            $('.score').remove();
            var score = 0;
            var radios = $('.op-radio');
            if(radios.length>0){
            radios.each(function(i){
                var parent = $(this).parents('li');
                if($(this).val()==1){
                    parent.css({"color": "green"});
                }
                if ($(this).is(':checked') && $(this).val()==0){
                    parent.css({"color": "red"});
                }
                if ($(this).is(':checked') && $(this).val()==1){
                    score++;
                }
            });
            var result = ((score*100)/(radios.length/3)).toFixed(2);
            if(result>=50){
                $('.questions-sec').append('<div class="score"> BRAVO! <br> Votre résultat est: ' + result
                    + '% <br> <img src="https://media.giphy.com/media/entHXoIrmcrAY/giphy.gif"></div>');
            }
            else {
                $('.questions-sec').append('<div class="score"> Votre résultat est: ' + result
                    + '% <br> Essayez Encore! <br> ' +
                    '<img src="https://media1.tenor.com/images/ed6b32b25ff81c820bb196bd6b1c7793/tenor.gif?itemid=10485573"> </div>');
                }
            }
        });
    </script>
@endsection