<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeployController;

Route::get("/oauth2callback", function () {
    $client = new \Google_Client();
    $client->setAuthConfig(storage_path("oauth/client_secret.json"));
    $client->setRedirectUri("https://rswfire.com/oauth2callback");
    $client->addScope(\Google_Service_YouTube::YOUTUBE_FORCE_SSL);
    $client->setAccessType("offline");
    $client->setPrompt("consent");

    if (request()->has("code")) {
        $accessToken = $client->fetchAccessTokenWithAuthCode(request("code"));
        file_put_contents(storage_path("oauth/tokens.json"), json_encode($accessToken));
        return "Tokens saved.";
    }

    return redirect()->away($client->createAuthUrl());
});

Route::get("/about", function () {
    return view("about");
});

Route::get("/{any}", function () {
    return view("app");
})->where("any", ".*");
