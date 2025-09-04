<?php

namespace App\Http\Controllers;

use App\Models\Lexicon as LexiconModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Lexicon extends Controller
{

    public function create()
    {
        if (!Auth::check() || Auth::id() !== 1) {
            abort(403, "Unauthorized.");
        }

        return Inertia::render("Lexicon/Edit", [
            "mode" => "create",
            "entry" => null,
        ]);
    }

    public function edit($term)
    {
        if (!Auth::check() || Auth::id() !== 1) {
            abort(403);
        }

        $entry = LexiconModel::where("lexicon_slug", $term)
            ->firstOrFail();

        return Inertia::render("Lexicon/Edit", [
            "mode" => "edit",
            "entry" => $entry,
        ]);
    }

    public function index()
    {
        $terms = LexiconModel::select([
            "lexicon_term",
            "lexicon_slug",
            "lexicon_category",
            "lexicon_essence",
        ])->orderBy("lexicon_term")->get();

        return Inertia::render("Lexicon/Index", [
            "canCreate" => auth()->check() && auth()->id() === 1,
            "terms" => $terms,
            "metaTitle" => "Lexicon | ".request()->getHost(),
            "metaDescription" => "",
            "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
        ]);
    }

    public function show($slug)
    {
        $entry = LexiconModel::where("lexicon_slug", $slug)->firstOrFail();

        // Get previous and next entries alphabetically
        $ordered = LexiconModel::orderBy('lexicon_term')->get();
        $currentIndex = $ordered->search(fn ($e) => $e->lexicon_slug === $slug);

        $previous = $currentIndex !== false && $currentIndex > 0
            ? $ordered[$currentIndex - 1]
            : null;

        $next = $currentIndex !== false && $currentIndex < $ordered->count() - 1
            ? $ordered[$currentIndex + 1]
            : null;

        return Inertia::render("Lexicon/Entry", [
            "canEdit" => auth()->check() && auth()->id() === 1,
            "entry" => $entry->toArray() + [
                    'previous' => $previous?->only(['lexicon_term', 'lexicon_slug']),
                    'next' => $next?->only(['lexicon_term', 'lexicon_slug']),
                ],
            "metaTitle" => $entry->lexicon_term." | Lexicon | ".request()->getHost(),
            "metaDescription" => "",
            "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
        ]);
    }


    public function store(Request $request)
    {
        if (!Auth::check() || Auth::id() !== 1) {
            abort(403, "Unauthorized.");
        }

        $validated = $request->validate([
            "lexicon_term" => "required|string|max:255",
            "lexicon_slug" => "required|string|max:255|unique:com_lexicon,lexicon_slug",
            "lexicon_category" => "nullable|string",
            "lexicon_essence" => "required|string",
            "lexicon_expanded" => "required|string",
            "lexicon_links" => "nullable|string",
            "tonality_mythic" => "nullable|string",
            "tonality_clinical" => "nullable|string",
            "tonality_poetic" => "nullable|string",
            "tonality_tactical" => "nullable|string",
        ]);

        LexiconModel::create($validated);

        return redirect()->route("lexicon.index");
    }

    public function update(Request $request, $term)
    {
        if (!Auth::check() || Auth::id() !== 1) {
            abort(403);
        }

        $entry = LexiconModel::where("lexicon_slug", $term)
            ->firstOrFail();

        $validated = $request->validate([
            "lexicon_term" => "required|string|max:255",
            "lexicon_slug" => "required|string|max:255|unique:com_lexicon,lexicon_slug," . $entry->lexicon_id . ",lexicon_id",
            "lexicon_category" => "nullable|string",
            "lexicon_essence" => "required|string",
            "lexicon_expanded" => "required|string",
            "lexicon_links" => "nullable|string",
            "tonality_mythic" => "nullable|string",
            "tonality_clinical" => "nullable|string",
            "tonality_poetic" => "nullable|string",
            "tonality_tactical" => "nullable|string",
        ]);

        $entry->update($validated);

        return redirect()->route("lexicon.show", [
            "slug" => $validated["lexicon_slug"],
        ]);
    }

}
