@extends("layout.main")
@section("page-title")
    Modifica Autore
@endsection
@section("main-content")
    <form action="{{route("update.author", $author->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group my-2">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="title">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Mario Rossi"
                   value="{{$author->name}}">
        </div>


        <div class="form-group my-2">
            @error('birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="description">Data di nascita</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{$author->birthday}}"
                   placeholder="YYYY-MM-DD"/>
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
        <a class="m-3" href="{{route('authors')}}">Annulla</a>
    </form>
@endsection
