<?php

use App\Http\Controllers\ProfileController;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;


Route::get('/auth/youtube', function () {
    $client = new Google_Client();
    $client->setClientId('969898322049-0kgk5bj8o759kvtlqh29vipatt0cdq0o.apps.googleusercontent.com');
    $client->setRedirectUri('https://rswfire.com/oauth2callback');
    $client->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);
    $client->setAccessType('offline');
    $client->setPrompt('consent');

    $authUrl = $client->createAuthUrl();
    return redirect($authUrl);
});

Route::get('/oauth2callback', function (Request $request) {
    $code = $request->query('code');

    if (!$code) {
        return response('Missing ?code param', 400);
    }

    $client = new Google_Client();
    $client->setClientId(config('services.google.client_id'));
    $client->setClientSecret(config('services.google.client_secret'));
    $client->setRedirectUri(config('services.google.redirect'));
    $client->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);
    $client->setAccessType('offline');

    $token = $client->fetchAccessTokenWithAuthCode($code);

    if (isset($token['error'])) {
        return response('Token exchange failed: ' . $token['error_description'], 500);
    }

    echo json_encode($token);

    Storage::put('oauth-tokens.json', json_encode($token, JSON_PRETTY_PRINT));

    return response('✅ OAuth tokens saved to storage/oauth-tokens.json');
});

Route::get("/", function () {
    $user = Auth::user();
    return Inertia::render("Home/Index", [
        "metaTitle" => "Home | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/fieldwork", function () {
    return Inertia::render("Fieldwork/Home", [
        "metaTitle" => "Fieldwork Records | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/fieldwork/create", function () {
    return Inertia::render("Fieldwork/Create", [
        "metaTitle" => "Fieldwork Records (Create) | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/fieldwork/{id}", function ($id) {
    $entry = DB::table("content")->where("content_id", $id)->first();

    if (!$entry) {
        abort(404);
    }

    return Inertia::render("Fieldwork/Entry", [
        "entry" => $entry,
        "metaTitle" => "Fieldwork Records (ID) | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/hello", function () {
    return Inertia::render("Hello", [
        "metaTitle" => "Who I Am | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/honeyman", function () {
    return Inertia::render("Honeyman", [
        "metaTitle" => "The Story of Honeyman | ".request()->getHost(),
        "metaDescription" => "A precise and permanent archive of institutional harm at Honeyman State Park. Documented by Sam White, this page exposes systemic coercion, silence, and dismissal inside Oregon State Parks.",
        "metaUrl" => "https://rswfire.com/honeyman",
    ]);
});

Route::get("/lexicon", function () {
    return Inertia::render("Lexicon", [
        "metaTitle" => "Lexicon | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/myth", function () {
    return Inertia::render("Myth", [
        "metaTitle" => "Myth | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get('/signal', function () {
    $user = auth()->user();

    $conversations = DB::table('chronicle_conversations')
        ->orderBy('stamp_started')
        ->select('conversation_id', 'conversation_title', 'stamp_started')
        ->paginate(21)
        ->onEachSide(1);

    return Inertia::render('Signal/Index', [
        'conversations' => $conversations,
        "metaTitle" => "Signal Archive | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get('/signal/{id}', function ($id) {
    $user = auth()->user();

    $conversation = DB::table('chronicle_conversations')->where('conversation_id', $id)->first();

    $messages = DB::table('chronicle_messages')
        ->where('conversation_id', $id)
        ->where('is_selected', true)
        ->whereNotNull('message_content')
        ->whereRaw('LENGTH(TRIM(message_content)) > 0')
        ->orderBy('stamp_created')
        ->orderBy("message_id")
        ->get();

    return Inertia::render('Signal/Entry', [
        'conversation' => $conversation,
        'messages' => $messages,
        "metaTitle" => "Signal Archive (ID) | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/tech", function () {
    return Inertia::render("Tech", [
        "metaTitle" => "What I Do | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});


Route::get("/transmission", function () {
    return Inertia::render("Transmission/Index", [
        'transmissions' => Transmission::orderByDesc('stamp_published')->paginate(24)->onEachSide(1),
        "metaTitle" => "Transmission Vault | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get('/transmission/{id}', function ($id) {
    $user = Auth::user();

    $transmission = DB::table('transmissions')
        ->where('transmission_id', $id)
        ->first();

    if (!$transmission) {
        abort(404, 'Transmission not found.');
    }

    $previous = Transmission::where(function ($query) use ($transmission) {
        $query->where('stamp_published', '<', $transmission->stamp_published)
            ->orWhere(function ($q) use ($transmission) {
                $q->where('stamp_published', $transmission->stamp_published)
                    ->where('transmission_id', '<', $transmission->transmission_id);
            });
    })
        ->where('transmission_id', '!=', $transmission->transmission_id)
        ->orderBy('stamp_published', 'desc')
        ->orderBy('transmission_id', 'desc')
        ->first();

    $next = Transmission::where(function ($query) use ($transmission) {
        $query->where('stamp_published', '>', $transmission->stamp_published)
            ->orWhere(function ($q) use ($transmission) {
                $q->where('stamp_published', $transmission->stamp_published)
                    ->where('transmission_id', '>', $transmission->transmission_id);
            });
    })
        ->where('transmission_id', '!=', $transmission->transmission_id)
        ->orderBy('stamp_published', 'asc')
        ->orderBy('transmission_id', 'asc')
        ->first();

    return Inertia::render('Transmission/Entry', [
        'transmission' => $transmission,
        'previous' => $previous,
        'next' => $next,
        "metaTitle" => "Transmission Vault (ID) | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/dashboard", function () {
    return Inertia::render("Dashboard");
})->middleware(["auth", "verified"])->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");
});

require __DIR__."/auth.php";
