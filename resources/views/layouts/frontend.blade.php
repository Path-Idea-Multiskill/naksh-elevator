<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- ================================================
    SEO TITLE
    ================================================= --}}

    <title>
        @yield(
            'title',
            $settings?->meta_title
            ?: 'Naksh Elevator'
        )
    </title>




    {{-- ================================================
    META DESCRIPTION
    ================================================= --}}

    <meta name="description" content="@yield(
        'meta_description',
        $settings?->meta_description
        ?: 'Professional elevator solutions.'
    )">


    {{-- ================================================
    FAVICON
    ================================================= --}}

    @if($settings?->favicon)

        <link rel="icon" href="{{ asset(
            'storage/' .
            $settings->favicon
        ) }}">

    @endif


    {{-- ================================================
    GLOBAL FRONTEND CSS
    ================================================= --}}

    <link rel="stylesheet" href="{{ asset(
    'assets/frontend/css/frontend.css'
) }}">

    <link rel="stylesheet" href="{{ asset(
    'assets/frontend/css/header.css'
) }}">

    <link rel="stylesheet" href="{{ asset(
    'assets/frontend/css/footer.css'
) }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/site-loader.css') }}">


    @stack('styles')



</head>


<body>

    @include('frontend.components.site-loader')

    {{-- HEADER --}}
    @include('frontend.partials.header')


    {{-- MAIN PAGE CONTENT --}}
    <main class="site-main">

        @yield('content')

    </main>


    {{-- FOOTER --}}
    @include('frontend.partials.footer')


    {{-- MOBILE MENU OVERLAY --}}
    <div class="site-menu-overlay" id="siteMenuOverlay"></div>


    {{-- GLOBAL FRONTEND JS --}}
    <script src="{{ asset(
    'assets/frontend/js/frontend.js'
) }}"></script>


    <script src="{{ asset('assets/frontend/js/site-loader.js') }}" defer></script>

    @stack('scripts')

</body>

</html>