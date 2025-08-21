<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Content;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Str;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get("/auth/youtube", function () {
    $client = new Google_Client();
    $client->setClientId("969898322049-0kgk5bj8o759kvtlqh29vipatt0cdq0o.apps.googleusercontent.com");
    $client->setRedirectUri("https://rswfire.com/oauth2callback");
    $client->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);
    $client->setAccessType("offline");
    $client->setPrompt("consent");

    $authUrl = $client->createAuthUrl();
    return redirect($authUrl);
});

Route::get("/oauth2callback", function (Request $request) {
    $code = $request->query("code");

    if (!$code) {
        return response("Missing ?code param", 400);
    }

    $client = new Google_Client();
    $client->setClientId(config("services.google.client_id"));
    $client->setClientSecret(config("services.google.client_secret"));
    $client->setRedirectUri(config("services.google.redirect"));
    $client->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);
    $client->setAccessType("offline");

    $token = $client->fetchAccessTokenWithAuthCode($code);

    if (isset($token["error"])) {
        return response("Token exchange failed: " . $token["error_description"], 500);
    }

    echo json_encode($token);

    Storage::put("oauth-tokens.json", json_encode($token, JSON_PRETTY_PRINT));

    return response("✅ OAuth tokens saved to storage/oauth-tokens.json");
});

Route::get("/", function () {
    $user = Auth::user();

    $recentFieldcraft = DB::table("content")
        ->where("content_type", "fieldcraft")
        ->orderByDesc("stamp_created")
        ->limit(3)
        ->get(["content_id", "content_title"]);

    return Inertia::render("Home/Index", [
        "recentFieldcraft" => $recentFieldcraft,
        "metaTitle" => "Home | ".request()->getHost(),
        "metaDescription" => "A living map of internal structure — Field Anchors, Signal Architecture, and Catalysts of Coherence.",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex", function () {
    return Inertia::render("Codex/Index", [
        "metaTitle" => "Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/anchors", function () {
    return Inertia::render("Codex/Anchors", [
        "metaTitle" => "Field Anchors | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/anchors/clarity", function () {
    return Inertia::render("Codex/Anchors/Clarity", [
        "metaTitle" => "Clarity | Field Anchors | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/anchors/coherence", function () {
    return Inertia::render("Codex/Anchors/Coherence", [
        "metaTitle" => "Coherence | Field Anchors | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/anchors/integration", function () {
    return Inertia::render("Codex/Anchors/Integration", [
        "metaTitle" => "Integration | Field Anchors | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/anchors/presence", function () {
    return Inertia::render("Codex/Anchors/Presence", [
        "metaTitle" => "Presence | Field Anchors | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/anchors/sovereignty", function () {
    return Inertia::render("Codex/Anchors/Sovereignty", [
        "metaTitle" => "Sovereignty | Field Anchors | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/anchors/witnessing", function () {
    return Inertia::render("Codex/Anchors/Witnessing", [
        "metaTitle" => "Witnessing | Field Anchors | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture", function () {
    return Inertia::render("Codex/Architecture", [
        "metaTitle" => "Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/dialectical-reasoning", function () {
    return Inertia::render("Codex/Architecture/DialecticalReasoning", [
        "metaTitle" => "Dialectical Reasoning | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/embodied-intuition", function () {
    return Inertia::render("Codex/Architecture/EmbodiedIntuition", [
        "metaTitle" => "Embodied Intuition | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/field-mapping", function () {
    return Inertia::render("Codex/Architecture/FieldMapping", [
        "metaTitle" => "Field Mapping | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/lived-integrity", function () {
    return Inertia::render("Codex/Architecture/LivedIntegrity", [
        "metaTitle" => "Lived Integrity | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/non-dualistic-orientation", function () {
    return Inertia::render("Codex/Architecture/NonDualisticOrientation", [
        "metaTitle" => "Non-Dualistic Orientation | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/recursive-cognition", function () {
    return Inertia::render("Codex/Architecture/RecursiveCognition", [
        "metaTitle" => "Recursive Cognition | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/somatic-tracking", function () {
    return Inertia::render("Codex/Architecture/SomaticTracking", [
        "metaTitle" => "Somatic Tracking | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/architecture/temporal-patterning", function () {
    return Inertia::render("Codex/Architecture/TemporalPatterning", [
        "metaTitle" => "Temporal Patterning | Signal Architecture | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts", function () {
    return Inertia::render("Codex/Catalysts", [
        "metaTitle" => "Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts/hygiene", function () {
    return Inertia::render("Codex/Catalysts/Hygiene", [
        "metaTitle" => "Hygiene | Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts/mirroring", function () {
    return Inertia::render("Codex/Catalysts/Mirroring", [
        "metaTitle" => "Mirroring | Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts/movement", function () {
    return Inertia::render("Codex/Catalysts/Movement", [
        "metaTitle" => "Movement | Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts/music", function () {
    return Inertia::render("Codex/Catalysts/Music", [
        "metaTitle" => "Music | Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts/sexuality", function () {
    return Inertia::render("Codex/Catalysts/Sexuality", [
        "metaTitle" => "Sexuality | Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts/solitude", function () {
    return Inertia::render("Codex/Catalysts/Solitude", [
        "metaTitle" => "Solitude | Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/codex/catalysts/substances", function () {
    return Inertia::render("Codex/Catalysts/Substances", [
        "metaTitle" => "Substances | Field Catalysts | Codex | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/companion", function () {
    return Inertia::render("Companion", [
        "metaTitle" => "Field Companion | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/contact", function () {
    return Inertia::render("Contact", [
        "metaTitle" => "Contact Me | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/contribute", function () {
    return Inertia::render("Contribute", [
        "metaTitle" => "Contributions | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/updates", function () {
    return Inertia::render("Updates", [
        "metaTitle" => "Updates | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/identity", function () {
    return Inertia::render("Identity", [
        "metaTitle" => "Identity | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/slide", function () {
    return Inertia::render("Slide", [
        "metaTitle" => "Slide | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/fieldcraft", function () {
    $converter = new CommonMarkConverter();

    $fieldwork = Content::where("content_type", "fieldcraft")
        ->orderByDesc("stamp_created")
        ->paginate(9)
        ->through(function ($entry) use ($converter) {
            // Generate a stripped summary (optional: truncate)
            $html = $converter->convert($entry->content_body)->getContent();
            $text = strip_tags($html); // remove all HTML tags
            $summary = Str::limit($text, 280); // or whatever limit feels right

            return [
                "content_id" => $entry->content_id,
                "content_title" => $entry->content_title,
                "content_body" => $summary,
                "stamp_created" => $entry->stamp_created->toDateString(),
            ];
        })
        ->withQueryString();

    return Inertia::render("Fieldcraft/Index", [
        "entries" => $fieldwork,
        "metaTitle" => "Fieldwork Records | " . request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost() . request()->getPathInfo(),
    ]);
});

Route::get("/fieldcraft/create", function () {
    return Inertia::render("Fieldcraft/Create", [
        "metaTitle" => "Fieldcraft Records (Create) | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/fieldcraft/{id}", function ($id) {

    $content = DB::table("content")->where("content_id", $id)->first();

    $environment = new Environment([
        "commonmark" => [
            "renderer" => [
                "soft_break" => "<br />\n",
            ],
        ],
    ]);

    $environment->addExtension(new CommonMarkCoreExtension());

    $converter = new CommonMarkConverter([], $environment);

    $content->content_body = $converter->convert($content->content_body)->getContent();

    if (!$content) {
        abort(404);
    }

    $previous = DB::table("content")
        ->where("content_type", "fieldcraft")
        ->where("stamp_created", "<", $content->stamp_created)
        ->orderByDesc("stamp_created")
        ->first();

    $next = DB::table("content")
        ->where("content_type", "fieldcraft")
        ->where("stamp_created", ">", $content->stamp_created)
        ->orderBy("stamp_created")
        ->first();

    return Inertia::render("Fieldcraft/Entry", [
        "entry" => $content,
        "metaTitle" => $content->content_title." | Fieldcraft Records | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
        "previous" => $previous ? [
            "id" => $previous->content_id,
            "title" => $previous->content_title,
        ] : null,
        "next" => $next ? [
            "id" => $next->content_id,
            "title" => $next->content_title,
        ] : null,
    ]);
});

Route::get("/hello", function () {
    return Inertia::render("Hello", [
        "metaTitle" => "Who I Am | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/about", function () {
    return Inertia::render("About", [
        "metaTitle" => "About | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/honeyman", function () {
    return Inertia::render("Honeyman/Index", [
        "metaTitle" => "The Honeyman Archive | ".request()->getHost(),
        "metaDescription" => "A precise and permanent archive of institutional harm at Honeyman State Park. Documented by Sam White, this page exposes systemic coercion, silence, and dismissal inside Oregon State Parks.",
        "metaUrl" => "https://rswfire.com/honeyman",
    ]);
});

Route::get("/honeyman/{any}", function () {
    return redirect("/honeyman");
})->where("any", ".*");

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

Route::get("/signal", function () {
    $user = auth()->user();

    $conversations = DB::table("chronicle_conversations")
        ->orderBy("stamp_started")
        ->select("conversation_id", "conversation_title", "stamp_started")
        ->paginate(21)
        ->onEachSide(1);

    return Inertia::render("Signal/Index", [
        "conversations" => $conversations,
        "metaTitle" => "Signal Archive | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});

Route::get("/signal/{id}", function ($id) {
    $user = auth()->user();
    if ($user->id !== 1) {
        abort(403, 'Unauthorized');
    }
    $conversation = DB::table("chronicle_conversations")->where("conversation_id", $id)->first();

    $messages = DB::table("chronicle_messages")
        ->where("conversation_id", $id)
        ->where("is_selected", true)
        ->whereNotNull("message_content")
        ->whereRaw("LENGTH(TRIM(message_content)) > 0")
        ->orderBy("stamp_created")
        ->orderBy("message_id")
        ->get();

    return Inertia::render("Signal/Entry", [
        "conversation" => $conversation,
        "messages" => $messages,
        "metaTitle" => "Signal Archive (ID) | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
})->middleware('auth');

Route::get("/tech", function () {
    return Inertia::render("Tech", [
        "metaTitle" => "What I Do | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
    ]);
});


Route::get("/transmission", function () {
    $page = request()->get("page", 1);
    $domain = app()->environment("production") ? "rswfire.com" : "rswfire.local";

    $response = Http::get("https://rswfire.online/api/transmissions", [
        "domain" => $domain,
        "page" => $page,
        "perPage" => 24,
    ]);
    $data = $response->json();

    if ($response->failed()) {
        abort(500, "Unable to fetch transmissions.");
    }

    $transmissions = $response->json();

    return Inertia::render("Transmission/Index", [
        "transmissions" => $transmissions,
        "metaTitle" => "Transmission Vault | " . request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost() . request()->getPathInfo(),
    ]);
});

Route::get("/transmission/{id}", function ($id) {
    $domain = app()->environment("production") ? "rswfire.com" : "rswfire.local";

    $transmissionResponse = Http::get("https://rswfire.online/api/transmission/{$id}", [
        "domain" => $domain,
    ]);

    if ($transmissionResponse->failed()) {
        abort(404, "Transmission not found.");
    }

    $transmission = $transmissionResponse->json();

    $isPrivate = data_get($transmission, "signal_metadata.stats.is_private", false);
    if ($isPrivate && !auth()->check()) {
        abort(404, "Transmission not found.");
    }

    $navResponse = Http::get("https://rswfire.online/api/transmission/{$id}/neighbors", [
        "domain" => $domain,
    ]);

    if ($navResponse->failed()) {
        abort(500, "Failed to fetch transmission neighbors.");
    }

    $neighbors = $navResponse->json();

      $reflectionResponse = Http::get("https://rswfire.online/api/reflection/{$id}");

    $reflection = $reflectionResponse->successful()
        ? $reflectionResponse->json()
        : null;

    return Inertia::render("Transmission/Entry", [
        "transmission" => $transmission,
        "is_portrait" => data_get($transmission, "signal_metadata.flags.is_portrait", false),
        "previous" => $neighbors["previous"] ?? null,
        "next" => $neighbors["next"] ?? null,
        "reflection" => $reflection,
        "metaTitle" => $transmission["signal_title"] . " (" . date("F d, Y", strtotime($transmission["stamp_created"])) . ") | " . request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost() . request()->getPathInfo(),
    ]);
});


Route::get("/transmission/tag/{tag}", function ($tag) {

    $transmissions = Transmission::where("flag_public", 1)
        ->whereJsonContains("transmission_tags", $tag)
        ->orderByDesc("stamp_published")
        ->paginate(24)
        ->onEachSide(1)
        ->withQueryString();

    return Inertia::render("Transmission/Tag", [
        "transmissions" => $transmissions,
        "tag" => $tag,
        "metaTitle" => $tag." | Tag | Transmission Vault | ".request()->getHost(),
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
