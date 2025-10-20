<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class TransmissionController extends Controller
{
    public function index()
    {
        $domain = app()->environment('production') ? 'rswfire.com' : 'rswfire.local';

        return Inertia::render('Transmission/Index', [
            'domain' => $domain,
            'metaTitle' => 'Transmissions | rswfire',
            'metaDescription' => 'Real-time archive of sovereign life mapped through recursive AI reflection',
            'metaUrl' => request()->url(),
        ]);
    }

    public function show(string $ulid)
    {
        $domain = app()->environment('production') ? 'rswfire.com' : 'rswfire.local';

        return Inertia::render('Transmission/Entry', [
            'ulid' => $ulid,
            'domain' => $domain,
            'metaTitle' => $ulid . ' | Transmission | rswfire',
            'metaDescription' => '',
            'metaUrl' => request()->url(),
        ]);
    }

    public function tag(string $tag)
    {
        $domain = app()->environment('production') ? 'rswfire.com' : 'rswfire.local';

        return Inertia::render('Transmission/Tag', [
            'tag' => $tag,
            'domain' => $domain,
            'metaTitle' => $tag . ' | Transmissions | rswfire',
            'metaDescription' => '',
            'metaUrl' => request()->url(),
        ]);
    }
}
