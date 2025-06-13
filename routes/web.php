<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", function () {
    $user = Auth::user();
    return Inertia::render("Home", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
        "authUser" => $user ? [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]: null
    ]);
});

Route::get("/fieldwork", function () {
    return Inertia::render("Fieldwork/Home", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/fieldwork/create", function () {
    return Inertia::render("Fieldwork/Create");
});

Route::get("/fieldwork/{id}", function ($id) {
    $entry = DB::table("content")->where("content_id", $id)->first();

    if (!$entry) {
        abort(404);
    }

    return Inertia::render("Fieldwork/Entry", [
        "entry" => $entry,
    ]);
});

Route::get("/hello", function () {
    return Inertia::render("Hello", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/honeyman", function () {
    return Inertia::render("Honeyman", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/lexicon", function () {
    return Inertia::render("Lexicon", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/myth", function () {
    return Inertia::render("Myth", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get('/signal', function () {
    $user = auth()->user();

    $conversations = DB::table('chronicle_conversations')
        ->orderByDesc('stamp_started')
        ->select('conversation_id', 'conversation_title', 'stamp_started')
        ->paginate(21);

    return Inertia::render('Signal/Index', [
        'conversations' => $conversations,
        'authUser' => auth()->user(),
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
        'authUser' => $user,
    ]);
});

Route::get("/tech", function () {
    return Inertia::render("Tech", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/transmission", function () {
    return Inertia::render("Transmission", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
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
