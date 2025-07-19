<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin panel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>





</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @if(request()->routeIs('ads.public') || request()->routeIs('ads.public.show') || request()->routeIs('category.show'))
                <x-sidebar :categories="$categories" />
            @elseif(auth()->check() && auth()->user()->isAdmin())
                @include('layouts.admin.sidebar')
            @elseif(auth()->check())
                @include('layouts.customer.sidebar')
            @endif


            <div class="col py-3 main-content">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>