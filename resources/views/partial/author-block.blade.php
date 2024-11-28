<tr>
    <td class="align-middle">{{$author->id}}</td>
    <td class="align-middle">{{$author->name}}</td>
    <td class="align-middle">{{$author->birthday}}</td>
    <td class="text-end">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{route("edit.author", $author->id)}}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
            <form action="{{ route("delete.author", $author->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Autore')"
                        class="btn btn-light"><i
                        class="bi bi-trash3" style="color: darkred"></i></button>
            </form>
        </div>
    </td>
</tr>


