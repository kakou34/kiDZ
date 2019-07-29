@extends('layouts.cms')

@section('title', 'DIY Admin')

@section('content')

    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">AJOUTER UNE VIDÉO:</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('storeDiy')}}">
                                <div class="form-group row">
                                    <label for="videoName" class="col-md-4 col-form-label text-md-right">Titre:</label>
                                    <div class="col-md-6">
                                        <input id="videoName" type="text"
                                               class="form-control @error('videoName') is-invalid @enderror"
                                               name="videoName"
                                               value="{{ old('videoName') }}" required autofocus>

                                        @error('videoName')
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

    <hr>

    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">TOUTES LES VIDÉOS</div>
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
                                        Lien
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach (\App\DiyVideo::all() as $video)
                                    <tr id="{{$video->id}}">
                                        <td>
                                            {{$video->id}}
                                        </td>
                                        <td>
                                            {{$video->name}}
                                        </td>
                                        <td  class="link-td">
                                            {{getYoutubeURL($video->link)}}
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary deleteDiy">
                                                Supprimer
                                            </button>
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
        $(document).on('click', '.deleteDiy', function(){
            var parent =  $(this).parents('tr');
            $.get("deleteDiy/"+ parent.attr('id') , function(data, status){
            });
            parent.addClass('removed');
            parent.remove();
            $(document).on('transitionend', '.removed', function() {
                $(this).remove();
            })
        });

    </script>
@endsection