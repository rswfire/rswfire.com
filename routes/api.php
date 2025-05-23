<?php

use App\Http\Controllers\Content;
use Illuminate\Support\Facades\Route;

Route::get("/content", [Content::class, "index"]);
Route::post("/content", [Content::class, "store"]);
Route::get("/content/{id}", [Content::class, "show"]);
