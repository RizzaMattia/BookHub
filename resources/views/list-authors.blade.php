@extends("layout.main")
@section("page-title")
    Lista autori
@endsection
@section("header-title")
    <a href="{{route("create.author")}}" class="btn btn-primary"><i
            class="bi bi-plus-circle"></i> Aggiungi un'Autore</a>
    <h2 class="mt-5 mb-4">Gli Autori</h2>
@endsection

@section("main-content")
    <div class="col-md-8">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="w-auto">#</th>
                <th scope="col" class="w-50">Autore</th>
                <th scope="col" class="w-50">Data di nascita (YYYY-MM-DD)</th>
                <th scope="col" class="w-100 text-end">Azioni</th>
            </tr>
            </thead>
            <tbody>
            @forelse($authors as $author)
                @include("partial.author-block")

            @empty
                <article class="card border-0">
                    <div class="col-12">
                        Non sono presenti Autori
                    </div>
                </article>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
