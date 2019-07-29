@extends('layouts.cms')
@section('title', 'Je lis Admin')
@section('content')
    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">MODIFIER UN ARTICLE</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('doEditArticle', ['articleID'=> $article->id ])}}"
                                  enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="articleName"
                                           class="col-md-2 col-form-label text-md-right">Titre:</label>
                                    <div class="col-md-9">
                                        <input id="articleName" type="text"
                                               class="form-control @error('articleName') is-invalid @enderror"
                                               name="articleName"
                                               value="{{$article->name}}" required autofocus>

                                        @error('articleName')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        <div>
                                            <input type="radio" id="imageOp" name="imageOp" value="yes">
                                            <label for="imageOp">Modifier l'image de couverture</label>
                                        </div>
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
                                            {{$article->content}}
                                        </textarea>

                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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


@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            });
        });

        $('input:radio[name="imageOp"]').change(
            function(){
                var parent = $(this).parents('.col-md-9');
                if ($(this).is(':checked')) {
                    $.get('/editImage' , function(data, status){
                        parent.append(data);
                    });
                }
            });
    </script>
@endsection
