@extends('layouts.cms')

@section('title', "J'apprends Admin")

@section('content')
    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">AJOUTER UNE MATIÈRE:</div>

                        <div class="card-body" style="height: 250px">
                            <form method="POST" action="{{route('storeSubject')}}" class="py-5">
                                <div class="form-group row">
                                    <label for="subjectName"
                                           class="col-md-4 col-form-label text-md-right">Matière:</label>
                                    <div class="col-md-6">
                                        <input id="subjectName" type="text"
                                               class="form-control @error('subjectName') is-invalid @enderror"
                                               name="subjectName"
                                               value="{{ old('subjectName') }}" required autofocus>

                                        @error('subjectName')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </div>

                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" >
                        <div class="card-header">TOUTES LES MATIÈRES DISPONIBLES</div>
                        <div class="card-body" id="SubjectsTable">
                            <table id="table_id" class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Matière
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (\App\Subject::all() as $subject)
                                    <tr id="{{$subject->id}}">
                                        <td>
                                            {{$subject->id}}
                                        </td>
                                        <td>
                                            {{$subject->name}}
                                        </td>
                                        <td>
                                            <a href="{{Route('deleteSubject', ['subjectID'=> $subject->id])}}">
                                                <button type="submit" class="btn btn-primary deleteSubject">
                                                    Supprimer
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">AJOUTER UNE NOUVELLE LEÇON</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('storeCourse')}}">
                                @csrf

                                <div class="form-group row">
                                    <label for="courseName" class="col-md-4 col-form-label text-md-right">Titre:</label>

                                    <div class="col-md-6">
                                        <input id="courseName" type="text"
                                               class="form-control @error('courseName') is-invalid @enderror"
                                               name="courseName"
                                               value="{{ old('courseName') }}" required autofocus>

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
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
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

    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">AFFICHER LES LEÇONS PAR MATIÈRE:</div>
                        <div class="card-body searchCard">
                            <div class="form-group row">
                                <label for="subjectIdTable"
                                       class="col-md-3 col-form-label text-md-right">Matière:</label>
                                <div class="col-md-6">
                                    <select id="subjectIdTable" name="subjectIdTable"
                                            class="form-control subjectIdTable" required>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        //brings list on load
        $(".searchCard table").remove();
        var selector = $("select.subjectIdTable");
        var selectedSubject = selector.children("option:selected").val();
        $.get("/searchCourses/" + selectedSubject, function (data, status) {
            $(".searchCard").append(data);
        });

        //handle search courses by subject
        $('select.subjectIdTable').on('change', function () {
            $(".searchCard table").remove();
            var selector = $("select.subjectIdTable");
            var selectedSubject = selector.children("option:selected").val();
            $.get("searchCourses/" + selectedSubject, function (data, status) {
                $(".searchCard").append(data);
            });
        });

        //delete a course from the list
        $(document).on('click', '.deleteCourse', function(){
            var parent =  $(this).parents('tr');
            $.get("deleteCourse/"+ parent.attr('id') , function(data, status){
            });
            parent.addClass('removed');
            parent.remove();
            // $(document).on('transitionend', '.removed', function() {
            //     $(this).remove();
            // })
        });
    </script>



@endsection