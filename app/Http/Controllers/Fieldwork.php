<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Fieldwork extends Controller
{
    public function index()
    {
        $fieldwork = Content::where('content_type', 'fieldwork')
            ->orderByDesc('stamp_published')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Fieldwork/Index', [
            'entries' => $fieldwork,
        ]);
    }

}
