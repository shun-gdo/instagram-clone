<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Microposts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body>

    {{-- ナビゲーションバー --}}
    @include('layouts.navigation')

    <div class="container mx-auto">

        @yield('content')
    </div>

</body>

</html>