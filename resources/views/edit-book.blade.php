@extends("layout.main")
@section("page-title")
    Modifica Libro
@endsection
@section("main-content")
    <form action="{{route("update.book", $book->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group my-2">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Esempio Titolo Libro"
                   value="{{$book->title}}">
        </div>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group my-2">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" placeholder="Questo libro parla..."
                      maxlength="800">{{$book->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="pages">Pagine</label>
            <input type="number" class="form-control" id="pages" name="pages" value="{{$book->pages}}"
                   placeholder="100">
        </div>
        <div class="form-group my-2">
            @error('author_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="author_id">Autore</label>
            <select name="author_id" id="author_id">
                @forelse($authors as $author)
                    <option
                        value="{{$author->id}}" {{($author->id == $book->author_id) ?'selected' : ''  }}>{{$author->name}}</option>
                @empty
                    <div>
                        Non sono presenti autori
                    </div>
                @endforelse
            </select>
        </div>
        <div class="form-group my-2">
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id">
                @forelse($categories as $category)
                    <option
                        value="{{$category->id}}" {{($category->id == $book->category_id) ?'selected' : ''  }}>{{$category->name}}</option>
                @empty
                    <div>
                        Non sono presenti categorie
                    </div>
                @endforelse
            </select>
        </div>

        @error('cover_image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group my-2">
            <label for="cover_image">Immagine di Copertura</label>
            <input type="file" class="form-control" id="cover_image" name="cover_image">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" class="img-fluid mt-2"
                     style="max-width: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="m-3" href="{{route('home')}}">Annulla</a>
    </form>
@endsection
