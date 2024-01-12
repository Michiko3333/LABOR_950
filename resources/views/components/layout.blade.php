<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/less/app.less')
    @vite('resources/scss/app.scss')
    @vite(['resources/js/app.js', 'resources/js/semantic.js'])
    @if (isset($title))
        <title>Karte - {{ $title }}</title>
    @else
        <title>Karte</title>
    @endif
    @if (isset($header))
        {{ $header }}
    @endif
</head>

<body>
    {{ $slot }}
</body>

</html>
