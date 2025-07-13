<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "message" => "required|string",
        ]);

        Mail::to("rsw@rswfire.com")->send(new ContactFormSubmitted($validated));

        return back()->with("success", "Thanks for reaching out.");
    }
}
