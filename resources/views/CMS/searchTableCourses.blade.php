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
            Matière
        </th>
        <th>
            Lien
        </th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    @foreach ($courses as $course)

        <tr id="{{$course->id}}">
            <td>
                {{$course->id}}
            </td>
            <td>
                {{$course->name}}
            </td>
            <td>
                {{$course->subject->name}}
            </td>
            <td class="link-td">
                {{getYoutubeURL($course->video_link)}}
            </td>

            <td>
                <a href="{{Route('loadEditCourse', ['$courseID'=> $course->id])}}">
                    <button type="submit" class="btn btn-primary editArticle">
                        Modifier
                    </button>
                </a>

            </td>

            <td>
                <button type="submit" class="btn btn-primary deleteCourse">
                    Supprimer
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>