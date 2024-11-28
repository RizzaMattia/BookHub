<div class="col-md-4 my-3">
    <div class="list-book">
        <article class="card border-0">
            <div class="card-body">
                <h3 class="card-title">{{ Str::substr($book->title, 0, 23)}}
                    {{strlen($book->title) > 23 ? '...' : ''}}</h3>
                <div>di {{$book->author->name}}</div>
                <div class="mt-2"><span class="badge text-bg-secondary">{{$book->category->name}}</span></div>
                <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                    <a href="{{route("show.book", $book->id)}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                    <a href="{{route("edit.book", $book->id)}}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route("delete.book", $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Libro')"
                                class="btn btn-light"><i
                                class="bi bi-trash3" style="color: darkred"></i></button>
                    </form>
                </div>
            </div>
        </article>
    </div>
</div>
