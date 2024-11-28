<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::orderBy("title")->get();
        $books->load("author", "category");
        return view('list-books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $authors = Authors::orderBy("name")->get();
        $categories = Categories::orderBy("name")->get();

        return view('add-book', compact("authors", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        $filename = null;
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');

            if ($image->isValid()) {
                $extension = $image->getClientOriginalExtension();

                $destinationPath = public_path('img');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $filename = uniqid('book_', true) . '.' . $extension;
                $imagePath = $destinationPath . '/' . $filename;

                $manager = new ImageManager(Driver::class);

                $imageManager = $manager->read($image->getRealPath());
                $image = $imageManager->cover(400,520);
                $image->save($imagePath);
            } else {
                return redirect()->back()->withErrors(['cover_image' => 'Invalid image file.']);
            }
        }

        Books::query()->create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'pages' => $validated['pages'] ?? null,
            'author_id' => $validated['author_id'],
            'category_id' => $validated['category_id'],
            'cover_image' => $filename
        ]);

        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        $book->load("author", "category");
        return view('show-book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $book)
    {

        $authors = Authors::orderBy("name")->get();
        $categories = Categories::orderBy("name")->get();

        return view('edit-book', compact('book', "authors", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Books $book): RedirectResponse
    {
        $validated = $request->validated();

        $filename = $book->image;
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');

            if ($image->isValid()) {
                $extension = $image->getClientOriginalExtension();
                $destinationPath = public_path('img');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $filename = uniqid('book_', true) . '.' . $extension;
                $imagePath = $destinationPath . '/' . $filename;

                $manager = new ImageManager(Driver::class);

                $imageManager = $manager->read($image->getRealPath());
                $image = $imageManager->cover(400, 520);
                $image->save($imagePath);

                if ($book->cover_image) {
                    $oldImagePath = public_path('img/' . $book->cover_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } else {
                return redirect()->back()->withErrors(['cover_image' => 'Invalid image file.']);
            }
        }

        $book->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'pages' => $validated['pages'] ?? null,
            'author_id' => $validated['author_id'],
            'category_id' => $validated['category_id'],
            'cover_image' => $filename,
        ]);

        return redirect()->route('home')->with('success', 'Book updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route("home")->with("success", "Libro eliminato correttamente");
    }
}
