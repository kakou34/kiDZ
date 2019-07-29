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
            Catégorie
        </th>
        <th>
            Lien
        </th>
        <th>
            Image
        </th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    @foreach ($games as $game)

        <tr id="{{$game->id}}">
            <td>
                {{$game->id}}
            </td>
            <td>
                {{$game->name}}
            </td>
            <td>
                {{$game->gameCategory->name}}
            </td>
            <td class="link-td" style="max-width: 200px;">
                {{$game->game_link}}
            </td>
            <td>
                <img src="{{asset($game->game_image)}}">
            </td>

            <td>
                <button type="submit" class="btn btn-primary deleteGame">
                    Supprimer
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>