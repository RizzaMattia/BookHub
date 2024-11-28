@extends("layout.main")
@section("page-title")
    I miei Libri
@endsection
@section("header-title")
    <a href="{{route("create.book")}}" class="btn btn-primary col-md-2"><i class="bi bi-plus-circle"></i> Aggiungi un
        Libro</a>
    <h2 class="mt-5 mb-4">I miei Libri</h2>
@endsection

@section("main-content")

    @forelse($books as $book)
        @include("partial.book-block")
    @empty
        <article class="card border-0">
            <div class="col-12">
                Non sono presenti Libri
            </div>
        </article>
    @endforelse
@endsection
