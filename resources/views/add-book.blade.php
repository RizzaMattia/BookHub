@extends("layout.main")
@section("page-title")
    Aggiungi Libro
@endsection
@section("main-content")
    <form action="{{route("store.book")}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group my-2">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Esempio Titolo Libro"
                   value="{{ old('title') }}">
        </div>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group my-2">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" placeholder="Questo libro parla..."
                      maxlength="800">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="pages">Pagine</label>
            <input type="number" class="form-control" id="pages" name="pages" value="{{ old('pages') }}"
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
                        value="{{$author->id}}" {{(old('author_id') == $author->id) ? 'selected' : ''  }}>{{$author->name}}</option>
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
                        value="{{$category->id}}" {{(old('category_id') == $category->id) ? 'selected' : ''  }}>{{$category->name}}</option>
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
        <div class="form-group">
            <label for="book_image" style="width: 400px" class="flex justify-between">Book's image (Max. 2MB) <span
                    class="text-sm opacity-75">(optional)</span></label>
            <label class="picture w-full input-outline @error('cover_image') error @enderror" for="cover_image"
                   tabIndex="0">
                <span class="book_image"></span>
            </label>
            <input type="file" name="cover_image" id="cover_image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="m-3" href="{{route('home')}}">Annulla</a>
    </form>
@endsection
