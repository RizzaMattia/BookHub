@extends("layout.main")
@section("page-title")
    Modifica Categoria
@endsection
@section("main-content")
    <form action="{{route("update.category", $category->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group my-2">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="title">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fantasy"
                   value="{{$category->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
        <a class="m-3" href="{{route('categories')}}">Annulla</a>
    </form>
@endsection
