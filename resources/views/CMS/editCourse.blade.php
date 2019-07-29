@extends('layouts.cms')

@section('title', 'Modifier une leçon')

@section('content')
    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">MODIFIER UNE LEÇON</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="courseName" class="col-md-4 col-form-label text-md-right">Titre:</label>

                                    <div class="col-md-6">
                                        <input id="courseName" type="text"
                                               class="form-control @error('courseName') is-invalid @enderror"
                                               name="courseName"
                                               value="{{ $course->name }}" required autofocus>

                                        @error('courseName')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="subjectId"
                                           class="col-md-4 col-form-label text-md-right">Matière:</label>

                                    <div class="col-md-6">
                                        <select id="subjectId"
                                                name="subjectId"
                                                class="form-control"
                                                required>
                                            <option value="{{$course->subject_id}}"
                                                    selected>{{$course->subject->name}}</option>
                                            @foreach($subjects as $subject)
                                                @if($subject->id != $course->subject_id)
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @error('subjectId')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="videoLink" class="col-md-4 col-form-label text-md-right">Lien
                                        Youtube:</label>

                                    <div class="col-md-6">
                                        <input id="videoLink" type="text"
                                               class="form-control @error('videoLink') is-invalid @enderror"
                                               name="videoLink"
                                               value="{{getYoutubeURL($course->video_link)}}"
                                               required>

                                        @error('videoLink')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary editCourse" id="{{$course->id}}">
                                            Enregistrer
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">AJOUTER UNE QUESTION</div>
                        <div class="card-body">
                            <form method="post" action="{{route('addQuestion', ['courseID'=> $course->id ])}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="question"
                                           class="col-md-4 col-form-label text-md-right">Question:</label>

                                    <div class="col-md-6">
                                        <textarea id="question"
                                                  class="form-control @error('question') is-invalid @enderror"
                                                  name="question"
                                                  required autofocus>
                                        </textarea>
                                        @error('question')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="option1" class="col-md-4 col-form-label text-md-right">Premier
                                        choix:</label>

                                    <div class="col-md-6">
                                        <input id="option1" type="text"
                                               class="form-control @error('option1') is-invalid @enderror"
                                               name="option1"
                                               placeholder="Premier choix"
                                               required>

                                        @error('option1')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="option2" class="col-md-4 col-form-label text-md-right">Deuxième
                                        choix:</label>

                                    <div class="col-md-6">
                                        <input id="option2" type="text"
                                               class="form-control @error('option2') is-invalid @enderror"
                                               name="option2"
                                               placeholder="Deuxième choix"
                                               required>

                                        @error('option2')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="option3" class="col-md-4 col-form-label text-md-right">Troisième
                                        choix:</label>

                                    <div class="col-md-6">
                                        <input id="option3" type="text"
                                               class="form-control @error('option3') is-invalid @enderror"
                                               name="option3"
                                               placeholder="Troisième choix"
                                               required>

                                        @error('option3')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="correct"
                                           class="col-md-4 col-form-label text-md-right">La réponse juste:</label>

                                    <div class="col-md-6">
                                        <select id="correct"
                                                name="correct"
                                                class="form-control"
                                                required>
                                            <option value="1" selected>Premier choix</option>
                                            <option value="2">Deuxième choix</option>
                                            <option value="3">Troisième choix</option>

                                        </select>

                                        @error('correct')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Ajouter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h3 class="pl-3">LES QUESTIONS DE CETTE LEÇON</h3>

    <div class="padding">
        <div class="container">
            <div class="row">
                @foreach($course->questions as $question)
                    <div class="col-md-4" id="{{$question->id}}">
                        <div class="card my-2">
                            <div class="card-header">{{$question->question}}</div>
                            <div class="card-body">
                                <ol>
                                    <li @if($question->correct == 1) style="color: #1d643b"@endif>{{$question->option1}}</li>
                                    <li @if($question->correct == 2) style="color: #1d643b"@endif>{{$question->option2}}</li>
                                    <li @if($question->correct == 3) style="color: #1d643b"@endif>{{$question->option3}}</li>
                                </ol>
                                <button type="submit" class="btn btn-primary deleteQuestion">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>





@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //edit the course's main information
        $(document).on('click', '.editCourse', function (e) {
            e.preventDefault();
            var name = $("#courseName").val();
            var link = $("#videoLink").val();
            var selector = $("#subjectId");
            var subject = selector.children("option:selected").val();

            $.ajax({
                type: 'POST',

                url: "/doEditCourse/" + $(this).attr('id'),

                data: {
                    courseName: name,
                    videoLink: link,
                    subjectId: subject
                },
                success: function (data) {
                    alert(data.success);
                }
            });

        });

        //delete a question from the list
        $(document).on('click', '.deleteQuestion', function(){
            var parent =  $(this).closest('.col-md-4');
            $.get("/deleteQuestion/"+ parent.attr('id') , function(data, status){
            });
            parent.addClass('removed');
            parent.remove();
        });
    </script>

@endsection

