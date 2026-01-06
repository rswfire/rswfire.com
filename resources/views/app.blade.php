<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ asset("favicon.ico") }}" type="image/x-icon">
        <script defer src="https://analytics.rswfire.online/script.js" data-website-id="05567003-a5d4-409d-b017-7df4328f2d4a"></script>
        <script src="https://js.stripe.com/v3/"></script>
        @routes
        @vite(["resources/js/app.js"], "assets")
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
