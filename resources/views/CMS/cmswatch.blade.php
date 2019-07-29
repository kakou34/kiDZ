@extends('layouts.cms')

@section('title', 'Je regarde Admin')

@section('content')
    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">AJOUTER UN PROGRAMME</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('storeShow')}}" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="showName" class="col-md-4 col-form-label text-md-right">Titre:</label>
                                    <div class="col-md-6">
                                        <input id="showName" type="text"
                                               class="form-control @error('showName') is-invalid @enderror"
                                               name="showName"
                                               value="{{ old('showName') }}" required autofocus>

                                        @error('showName')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Image:</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file"
                                               name="image"
                                               class="form-control  @error('image') is-invalid @enderror"
                                               required>
                                        @error('image')
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
            </div>
            <hr>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">AJOUTER UN ÉPISODE</div>
                            <div class="card-body">
                                <form method="POST" action="{{route('storeEpisode')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="epName" class="col-md-4 col-form-label text-md-right">Titre:</label>
                                        <div class="col-md-6">
                                            <input id="epName" type="text"
                                                   class="form-control @error('epName') is-invalid @enderror"
                                                   name="epName"
                                                   value="{{ old('epName') }}" required autofocus>

                                            @error('epName')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="showId"
                                               class="col-md-4 col-form-label text-md-right">Programme:</label>

                                        <div class="col-md-6">
                                            <select id="showId" name="showId" class="form-control" required>
                                                @foreach($shows as $show)
                                                    <option value="{{$show->id}}">{{$show->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('showId')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="epLink" class="col-md-4 col-form-label text-md-right">Lien
                                            Youtube:</label>

                                        <div class="col-md-6">
                                            <input id="epLink" type="text"
                                                   class="form-control @error('epLink') is-invalid @enderror"
                                                   name="epLink"
                                                   required>

                                            @error('epLink')
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
            <hr>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">AFFICHER LES ÉPISODES PAR PROGRAMME</div>
                            <div class="card-body searchCard">
                                    <div class="form-group row">
                                        <label for="showIdTable"
                                               class="col-md-3 col-form-label text-md-right">Programme:</label>
                                        <div class="col-md-6">
                                            <select id="showIdTable" name="showIdTable" class="form-control showIdTable" required >
                                                @foreach($shows as $show)
                                                    <option value="{{$show->id}}">{{$show->name}}</option>
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
    </div>
    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">TOUS LES PROGRAMMES DISPONIBLES</div>
                        <div class="card-body">
                            <table id="table_id" class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Titre
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($shows as $show)
                                    <tr id="{{$show->id}}">
                                        <td>
                                            {{$show->id}}
                                        </td>
                                        <td>
                                            {{$show->name}}
                                        </td>
                                        <td>
                                            <img src="{{asset($show->image_src)}}" style="width: 100px; height: 60px">
                                        </td>
                                        <td>
                                            <a href="{{Route('deleteShow', ['showID'=> $show->id])}}">
                                            <button type="submit" class="btn btn-primary deleteShow">
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
@endsection
@section('script')
    <script>
        //brings list on load
        $(".searchCard table").remove();
        var selector = $("select.showIdTable");
        var selectedShow = selector.children("option:selected").val();
        console.log(selectedShow);
        $.get("searchEpisodes/"+selectedShow , function(data, status){
            console.log(data);
            $(".searchCard").append(data);
        });

        //handle search episodes by show
        $('select.showIdTable').on('change', function () {
            $(".searchCard table").remove();
            var selector = $("select.showIdTable");
            var selectedShow = selector.children("option:selected").val();
            console.log(selectedShow);
            $.get("searchEpisodes/"+selectedShow , function(data, status){
                $(".searchCard").append(data);
            });
        });



        $(document).on('click', '.deleteEpisode', function(){
            var parent =  $(this).parents('tr');
            $.get("deleteEpisode/"+ parent.attr('id') , function(data, status){
            });
            console.log(parent.attr('id'));
            parent.addClass('removed');
            parent.remove();
        });

    </script>
    @endsection

