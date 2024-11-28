@extends("layout.main")
@section("page-title")
    Dettaglio Libro
@endsection
@section("main-content")
<article class="detail-book row py-3 px-1 rounded-4">
    <div class="col-md-4">
        <figure>
            <img src="{{asset("img/".($book->cover_image ?? "no-cover.webp"))}}" class="rounded" alt="Titolo Libro">
        </figure>
    </div>
    <div class="col-md-4">
        <h2 class="mb-3">{{$book->title}}</h2>
        <div>
            <p>{{$book->description}}</p>
        </div>
        <div class="border-top mt-2 pt-3">
            <span class="badge text-bg-secondary">{{$book->author->name}}</span>
            <span class="badge text-bg-secondary">{{$book->category->name}}</span>
            <span class="badge text-bg-secondary">{{$book->pages}} pagine</span>
        </div>
    </div>
</article>
@endsection
