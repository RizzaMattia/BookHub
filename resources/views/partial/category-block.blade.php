<tr>
    <td class="align-middle">{{$category->id}}</td>
    <td class="align-middle">{{$category->name}}</td>
    <td class="text-end">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{route("edit.category", $category->id)}}" class="btn btn-secondary"><i
                    class="bi bi-pencil"></i></a>
            <form action="{{ route("delete.category", $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando una Categoria')"
                        class="btn btn-light"><i
                        class="bi bi-trash3" style="color: darkred"></i></button>
            </form>
        </div>
    </td>
</tr>
