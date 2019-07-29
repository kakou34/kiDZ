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
            Programme
        </th>
        <th>
            Lien
        </th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    @foreach (\App\Episode::showEpisodes($showTableId) as $episode)

        <tr id="{{$episode->id}}">
            <td>
                {{$episode->id}}
            </td>
            <td>
                {{$episode->name}}
            </td>
            <td>
                {{$episode->show->name}}
            </td>
            <td class="link-td" >
                {{getYoutubeURL($episode->link)}}
            </td>

            <td>
                <button type="submit" class="btn btn-primary deleteEpisode">
                    Supprimer
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>