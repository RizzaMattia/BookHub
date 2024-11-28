@extends("layout.main")
@section("page-title")
    Aggiungi Autore
@endsection
@section("main-content")
    <form action="{{route("store.author")}}" method="post">
        @csrf

        <div class="form-group my-2">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="title">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Mario Rossi"
                   value="{{ old('name') }}">
        </div>


        <div class="form-group my-2">
            @error('birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="description">Data di nascita</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}"
                   placeholder="YYYY-MM-DD"/>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
        <a class="m-3" href="{{route('authors')}}">Annulla</a>
    </form>
@endsection
