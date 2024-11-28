<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::orderBy("id")->get();
        return view('list-authors', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-author');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        Authors::create($request->validated());
        return redirect()->route("authors")->with("success", "Autore aggiunto correttamente");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $author)
    {
        return view('edit-author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Authors $author)
    {
        $author->update($request->validated());
        return redirect()->route("authors")->with("success", "Autore aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $author)
    {
        $author->delete();
        return redirect()->route("authors")->with("success", "Autore eliminato correttamente");
    }
}
