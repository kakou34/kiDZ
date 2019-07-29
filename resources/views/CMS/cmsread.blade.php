@extends('layouts.cms')

@section('title', 'Je lis Admin')

@section('content')

    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">AJOUTER UN ARTICLE</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('postArticle')}}" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="articleName" class="col-md-2 col-form-label text-md-right">Titre:</label>
                                    <div class="col-md-9">
                                        <input id="articleName" type="text"
                                               class="form-control @error('articleName') is-invalid @enderror"
                                               name="articleName"
                                               value="{{ old('articleName') }}" required autofocus>

                                        @error('articleName')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-2 col-form-label text-md-right">Image:</label>
                                    <div class="col-md-9">
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

                                <div class="form-group row">
                                    <label for="content" class="col-md-2 col-form-label text-md-right">Contenu:
                                    </label>

                                    <div class="col-md-9">
                                        <textarea id="content" rows="10" cols="30"
                                               class="form-control summernote @error('content') is-invalid @enderror"
                                               name="content"
                                                  required>
                                        </textarea>

                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-2 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
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


    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">TOUS LES ARTICLES DISPONIBLES</div>
                        <div class="card-body">
                            <table id="table_id" class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Image</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($articles as $article)
                                    <tr id="{{$article->id}}">
                                        <td>{{$article->id}}</td>
                                        <td>{{$article->name}}</td>
                                        <td><img src="{{asset($article->image_src)}}"></td>
                                        <td><a href="{{Route('loadEditArticle', ['articleID'=> $article->id])}}">
                                            <button type="submit" class="btn btn-primary editArticle">
                                                Modifier
                                            </button>
                                            </a></td>
                                        <td><button type="submit" class="btn btn-primary deleteArticle">
                                                Supprimer
                                            </button></td>
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

    <script type="text/javascript">

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }});
        });

        $(document).on('click', '.deleteArticle', function(){
            var parent =  $(this).parents('tr');
            $.get("deleteArticle/"+ parent.attr('id') , function(data, status){
            });
            parent.addClass('removed');
            parent.remove();
        });

    </script>


@endsection