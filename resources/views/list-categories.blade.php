@extends("layout.main")
@section("page-title")
    Lista Categorie
@endsection
@section("header-title")
    <a href="{{route("create.category")}}" class="btn btn-primary col-md-2"><i class="bi bi-plus-circle"></i> Aggiungi una
        Categoria</a>
    <h2 class="mt-5 mb-4">Categorie</h2>
@endsection

@section("main-content")
    <div class="col-md-8">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="w-auto">#</th>
                <th scope="col" class="w-75">Categoria</th>
                <th scope="col" class="w-auto text-end">Azioni</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                @include("partial.category-block")

            @empty
                <article class="card border-0">
                    <div class="col-12">
                        Non sono presenti Categorie
                    </div>
                </article>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
