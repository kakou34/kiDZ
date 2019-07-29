@extends('layouts.cms')

@section('title', 'Je joue Admin')

@section('content')

    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">AJOUTER UNE CATÉGORIE</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('storeGameCategory')}}" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="categoryName" class="col-md-4 col-form-label text-md-right">Titre:</label>
                                    <div class="col-md-6">
                                        <input id="categoryName" type="text"
                                               class="form-control @error('categoryName') is-invalid @enderror"
                                               name="categoryName"
                                               value="{{ old('categoryName') }}" required autofocus>

                                        @error('categoryName')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary"> Ajouter</button>
                                    </div>
                                </div>

                                @csrf
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">AJOUTER UN JEU</div>

                            <div class="card-body">
                                <form method="POST" action="{{route('storeGame')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="gameName" class="col-md-4 col-form-label text-md-right">Titre:</label>

                                        <div class="col-md-6">
                                            <input id="gameName" type="text"
                                                   class="form-control @error('gameName') is-invalid @enderror"
                                                   name="gameName"
                                                   value="{{ old('gameName') }}" required autofocus>

                                            @error('gameName')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="categoryId"
                                               class="col-md-4 col-form-label text-md-right">Catégorie:</label>

                                        <div class="col-md-6">
                                            <select id="categoryId" name="categoryId" class="form-control" required>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('categoryId')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gameLink" class="col-md-4 col-form-label text-md-right">Lien
                                            du jeu:</label>

                                        <div class="col-md-6">
                                            <input id="gameLink" type="text"
                                                   class="form-control @error('gameLink') is-invalid @enderror"
                                                   name="gameLink"
                                                   value="{{ old('gameLink') }}"
                                                   required>

                                            @error('gameLink')
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
                            <div class="card-header">AFFICHER LES JEUX PAR CATÉGORIE</div>
                            <div class="card-body searchCard">
                                <div class="form-group row">
                                    <label for="categoryIdTable"
                                           class="col-md-3 col-form-label text-md-right">Catégorie:</label>
                                    <div class="col-md-6">
                                        <select id="categoryIdTable" name="categoryIdTable" class="form-control categoryIdTable" required >
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                        <div class="card-header">TOUTES LES CATÉGORIES DISPONIBLES</div>
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
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($categories as $category)
                                    <tr id="{{$category->id}}">
                                        <td>
                                            {{$category->id}}
                                        </td>
                                        <td>
                                            {{$category->name}}
                                        </td>
                                        <td>
                                            <a href="{{Route('deleteGameCategory', ['categoryID'=> $category->id])}}">
                                                <button type="submit" class="btn btn-primary deleteCategory">
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
        //brings games list on load according to the first category (search by default)
        $(".searchCard table").remove();
        var selector = $("select.categoryIdTable");
        var selectedCategory = selector.children("option:selected").val();
        $.get("searchGames/"+selectedCategory , function(data, status){
            $(".searchCard").append(data);
        });

        //handle search games by category
        $('select.categoryIdTable').on('change', function () {
            $(".searchCard table").remove();
            var selector = $("select.categoryIdTable");
            var selectedCategory = selector.children("option:selected").val();
            $.get("searchGames/"+selectedCategory , function(data, status){
                $(".searchCard").append(data);
            });
        });

        $(document).on('click', '.deleteGame', function(){
            var parent =  $(this).parents('tr');
            $.get("deleteGame/"+ parent.attr('id') , function(data, status){
            });
            parent.addClass('removed');
            parent.remove();
        });

    </script>
@endsection

