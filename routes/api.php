<?php

use App\Http\Controllers\Content;
use App\Models\Lexicon;
use Illuminate\Support\Facades\Route;

Route::get("/content", [Content::class, "index"]);
Route::middleware('field.key')->post("/content", [Content::class, "store"]);
Route::get("/content/{id}", [Content::class, "show"]);

Route::get('/lexicon/lookup/{term}', function ($term) {
    return Lexicon::select('lexicon_term', 'lexicon_slug', 'lexicon_essence')
        ->whereRaw('LOWER(lexicon_term) = LOWER(?)', [$term])
        ->firstOrFail();
});
