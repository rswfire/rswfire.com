<?php

use App\Http\Controllers\Content;
use Illuminate\Support\Facades\Route;

Route::get("/content", [Content::class, "index"]);
Route::middleware('field.key')->post("/content", [Content::class, "store"]);
Route::get("/content/{id}", [Content::class, "show"]);
