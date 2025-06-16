<?php

use App\Http\Controllers\ProfileController;
use App\Models\Content;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Str;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;


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

    $recentFieldwork = DB::table('content')
        ->where('content_type', 'fieldwork')
        ->orderByDesc('stamp_created')
        ->limit(3)
        ->get(['content_id', 'content_title']);

    return Inertia::render("Home/Index", [
        "recentFieldwork" => $recentFieldwork,
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

Route::get("/fieldwork", function () {
    $converter = new CommonMarkConverter();

    $fieldwork = Content::where('content_type', 'fieldwork')
        ->orderByDesc('stamp_created')
        ->paginate(9)
        ->through(function ($entry) use ($converter) {
            // Generate a stripped summary (optional: truncate)
            $html = $converter->convert($entry->content_body)->getContent();
            $text = strip_tags($html); // remove all HTML tags
            $summary = Str::limit($text, 280); // or whatever limit feels right

            return [
                'content_id' => $entry->content_id,
                'content_title' => $entry->content_title,
                'content_body' => $summary,
                'stamp_created' => $entry->stamp_created->toDateString(),
            ];
        })
        ->withQueryString();

    return Inertia::render('Fieldwork/Index', [
        'entries' => $fieldwork,
        "metaTitle" => "Fieldwork Records | " . request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost() . request()->getPathInfo(),
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

    $content = DB::table("content")->where("content_id", $id)->first();

    $environment = new Environment([
        'commonmark' => [
            'renderer' => [
                'soft_break' => "<br />\n",
            ],
        ],
    ]);

    $environment->addExtension(new CommonMarkCoreExtension());

    $converter = new CommonMarkConverter([], $environment);

    $content->content_body = $converter->convert($content->content_body)->getContent();

    if (!$content) {
        abort(404);
    }

    $previous = DB::table('content')
        ->where('content_type', 'fieldwork')
        ->where('stamp_created', '<', $content->stamp_created)
        ->orderByDesc('stamp_created')
        ->first();

    $next = DB::table('content')
        ->where('content_type', 'fieldwork')
        ->where('stamp_created', '>', $content->stamp_created)
        ->orderBy('stamp_created')
        ->first();

    return Inertia::render("Fieldwork/Entry", [
        "entry" => $content,
        "metaTitle" => $content->content_title." | Fieldwork Records | ".request()->getHost(),
        "metaDescription" => "",
        "metaUrl" => request()->getSchemeAndHttpHost().request()->getPathInfo(),
        'previous' => $previous ? [
            'id' => $previous->content_id,
            'title' => $previous->content_title,
        ] : null,
        'next' => $next ? [
            'id' => $next->content_id,
            'title' => $next->content_title,
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

Route::get("/honeyman", function () {
    return Inertia::render("Honeyman", [
        "metaTitle" => "The Story of Honeyman | ".request()->getHost(),
        "metaDescription" => "A precise and permanent archive of institutional harm at Honeyman State Park. Documented by Sam White, this page exposes systemic coercion, silence, and dismissal inside Oregon State Parks.",
        "metaUrl" => "https://rswfire.com/honeyman",
    ]);
});

Route::get('/honeyman/{any}', function () {
    return redirect('/honeyman');
})->where('any', '.*');

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
