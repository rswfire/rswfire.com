<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ request()->getHost() }}</title>
    @vite(["resources/css/app.css", "resources/js/about.js"])
</head>
<body>
<div id="app"></div>
</body>
</html>
