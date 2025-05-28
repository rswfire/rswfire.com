<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ request()->getHost() }}</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5K6H8GR1Q7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-XXXXXXXXXX');
    </script>
</head>
<body>
<div id="app"></div>
</body>
</html>
