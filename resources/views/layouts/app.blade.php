<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="https://demo.hitoisi.com/storage/images/resources/TAcDifi1Jh1eREpYQlqm33Hr8dHVLiKO73gVZGP4.png" type="image/x-icon">
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="theme-color" content="#262d79">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="neurogenbd.com">

    @stack('metainfo')
    @stack('stylesheet')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/hitoisi.css') }}">

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1942883292661205');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1942883292661205&ev=PageView&noscript=1"
        />
    </noscript>
    <!-- End Facebook Pixel Code -->

    @livewireStyles
</head>
<body>

    @livewire('app.layout.topbar')
    @livewire('app.layout.navbar')

    <main>
        @yield('content')
    </main>

    @livewire('app.layout.jump')
    @livewire('app.layout.bottom-navigator')
    @livewire('app.layout.footer')
    @livewire('app.layout.copyright')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/hitoisi.js') }}"></script>
    
    @stack('scripts')
    @stack('modals')

    @livewireScripts
</body>
</html>
