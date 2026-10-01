<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Dashboard') | Naksh Elevator
    </title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/cabin-designs.css') }}">

    @stack('styles')
</head>

<body>

    <div class="admin-layout">

        {{-- Mobile overlay --}}
        <div class="sidebar-overlay" id="sidebarOverlay"></div>


        {{-- Sidebar --}}
        @include('admin.partials.sidebar')


        <div class="admin-main">

            {{-- Header --}}
            @include('admin.partials.header')


            <main class="admin-content">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif


                @yield('content')

            </main>

        </div>

    </div>


    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>

    @stack('scripts')

</body>

</html>