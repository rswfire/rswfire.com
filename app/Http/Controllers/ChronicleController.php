<?php

namespace App\Http\Controllers;

use App\Models\Chronicle\Conversation as ChronicleConversation;
use App\Models\Chronicle\Message as ChronicleMessage;
use Inertia\Inertia;

class ChronicleController extends Controller
{
    public function show($id)
    {
        $conversation = ChronicleConversation::findOrFail($id);
        $messages = ChronicleMessage::where('conversation_id', $id)
            ->where('is_selected', true)
            ->orderBy('stamp_created')
            ->get();

        return Inertia::render('Chronicle/Entry', [
            'conversation' => $conversation,
            'messages' => $messages,
            'authUser' => auth()->user(),
        ]);
    }
}
