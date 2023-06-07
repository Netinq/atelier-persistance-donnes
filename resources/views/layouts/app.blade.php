<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Default meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Ma bibliotèque</title>

</head>

<body>
    @include('layouts.header')
    @yield('content')
    @yield('scripts')
</body>

</html>
