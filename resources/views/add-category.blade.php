@extends("layout.main")
@section("page-title")
    Aggiungi Categoria
@endsection
@section("main-content")
    <form action="{{route("store.category")}}" method="post">
        @csrf
        <div class="form-group my-2">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="title">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fantasy"
                   value="{{old("name")}}">
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
        <a class="m-3" href="{{route('categories')}}">Annulla</a>
    </form>
@endsection
