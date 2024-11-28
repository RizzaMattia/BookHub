<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CateogryController;
use Illuminate\Support\Facades\Route;

Route::get("/",[BookController::class, 'index'])->name("home");
Route::get("/show/{book}", [BookController::class, "show"])->name("show.book");
Route::get("/add",[BookController::class, 'create'])->name("create.book");
Route::post("/store",[BookController::class, 'store'])->name("store.book");
Route::get("/edit/{book}",[BookController::class, 'edit'])->name("edit.book");
Route::put("/update/{book}",[BookController::class, 'update'])->name("update.book");
Route::delete("/delete/{book}",[BookController::class, 'destroy'])->name("delete.book");


Route::get("/authors",[AuthorController::class, 'index'])->name("authors");
Route::get("/authors/add",[AuthorController::class, 'create'])->name("create.author");
Route::post("/authors/store",[AuthorController::class, 'store'])->name("store.author");
Route::get("/authors/edit/{author}",[AuthorController::class, 'edit'])->name("edit.author");
Route::put("/authors/update/{author}",[AuthorController::class, 'update'])->name("update.author");
Route::delete("/authors/delete/{author}",[AuthorController::class, 'destroy'])->name("delete.author");


Route::get("/categories",[CateogryController::class, 'index'])->name("categories");
Route::get("/categories/add",[CateogryController::class, 'create'])->name("create.category");
Route::post("/categories/store",[CateogryController::class, 'store'])->name("store.category");
Route::get("/categories/edit/{category}",[CateogryController::class, 'edit'])->name("edit.category");
Route::put("/categories/update/{category}",[CateogryController::class, 'update'])->name("update.category");
Route::delete("/categories/delete/{category}",[CateogryController::class, 'destroy'])->name("delete.category");
