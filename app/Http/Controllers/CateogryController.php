<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CateogryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::orderBy("name")->get();
        return view('list-categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreCategoryRequest $request)
    {
        Categories::create($request->validated());
        return redirect()->route("categories")->with("success", "Categoria aggiunta correttamente");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        return view('edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Categories $category)
    {
        $category->update($request->validated());
        return redirect()->route("categories")->with("success", "Categoria aggiornata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route("categories")->with("success", "Categoria eliminata correttamente");
    }
}
