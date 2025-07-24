<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Site şablonu</title>
</head>
<body class="bg-[#F3F4F6]">


@include('layout.header')

<div class="grid grid-cols-1 lg:grid-cols-3 max-w-3xl mx-auto gap-4 my-5">
    <main class="col-span-2 space-y-4">

        @yield('content')

    </main>
    <aside class="hidden lg:block space-y-4">
        <!--Arkadaş İstekleri-->
        @auth
            @include('layout.friend-requests-card')
        @endauth

        <!--Popüler Gruplar-->
        @include('layout.populer-group')
    </aside>
</div>

</body>
</html>
