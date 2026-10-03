<header class="site-header" id="siteHeader">

    {{-- ================================================
    TOP BAR
    ================================================= --}}

    <div class="site-topbar">

        <div class="site-container site-topbar-inner">

            <div class="site-topbar-left">

                @if($settings?->email)

                    <a href="mailto:{{ $settings->email }}">
                        {{ $settings->email }}
                    </a>

                @endif


                @if($settings?->business_hours)

                    <span>
                        {{ $settings->business_hours }}
                    </span>

                @endif

            </div>


            <!-- <div class="site-topbar-right">

                @if($settings?->primary_phone)

                            <a
                                href="tel:{{
                    preg_replace(
                        '/[^0-9+]/',
                        '',
                        $settings->primary_phone
                    )
                                                                                                                                    }}">
                                {{ $settings->primary_phone }}
                            </a>

                @endif

            </div> -->

            <div class="site-topbar-right">

                @if(
                        $settings?->primary_phone ||
                        $settings?->secondary_phone
                    )

                    <div class="site-topbar-phones">

                        @if($settings?->primary_phone)

                                    <a href="tel:{{
                            preg_replace(
                                '/[^0-9+]/',
                                '',
                                $settings->primary_phone
                            )
                                    }}">
                                        {{ $settings->primary_phone }}
                                    </a>

                        @endif


                        @if(
                                $settings?->primary_phone &&
                                $settings?->secondary_phone
                            )

                            <span class="site-topbar-phone-separator">
                                ,
                            </span>

                        @endif


                        @if($settings?->secondary_phone)

                                    <a href="tel:{{
                            preg_replace(
                                '/[^0-9+]/',
                                '',
                                $settings->secondary_phone
                            )
                                    }}">
                                        {{ $settings->secondary_phone }}
                                    </a>

                        @endif

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- ================================================
    MAIN NAVBAR
    ================================================= --}}

    <div class="site-navbar">

        <div class="site-container site-navbar-inner">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="site-logo" aria-label="Naksh Elevator Home">

                <img src="{{
    $settings?->logo
    ? asset(
        'storage/' .
        $settings->logo
    )
    : asset(
        'images/logo/naksh-logo.png'
    )
                    }}" alt="{{
    $settings?->company_name
    ?: 'Naksh Elevator'
                    }}">

            </a>


            {{-- DESKTOP NAV --}}
            <nav class="site-nav">

                <a href="{{ route('home') }}" class="{{
    request()->routeIs('home')
    ? 'active'
    : ''
                    }}">
                    Home
                </a>


                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    About Us
                </a>


                <a href="{{ route('elevator-types.index') }}" class="{{
    request()->routeIs('elevator-types.*')
    ? 'active'
    : ''
    }}">
                    Elevator Types
                </a>


                <!-- <a href="{{ route('services.index') }}" class="{{
    request()->routeIs('services.*')
    ? 'active'
    : ''
    }}">
                    Services
                </a> -->


                <a href="{{ route('projects.index') }}" class="{{
    request()->routeIs('projects.*')
    ? 'active'
    : ''
    }}">
                    Projects
                </a>


                <a href="{{ route('gallery.index') }}" class="{{
    request()->routeIs('gallery.*')
    ? 'active'
    : ''
    }}">
                    Gallery
                </a>


                <a href="{{ route('contact.index') }}" class="{{
    request()->routeIs('contact.*')
    ? 'active'
    : ''
    }}">
                    Contact
                </a>

            </nav>


            {{-- DESKTOP CTA --}}
            <div class="site-navbar-actions">

                <!-- <a href="#" class="site-quote-btn">
                    Get Free Quote
                </a> -->

                <a href="{{ route('quote.index') }}" class="site-quote-btn {{
    request()->routeIs('quote.*')
    ? 'active'
    : ''
    }}">
                    Get Free Quote
                </a>

                {{-- MOBILE TOGGLE --}}
                <button type="button" class="site-menu-toggle" id="siteMenuToggle" aria-label="Open navigation menu"
                    aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

        </div>

    </div>


    {{-- ================================================
    MOBILE MENU
    ================================================= --}}

    <div class="site-mobile-menu" id="siteMobileMenu">

        <div class="site-mobile-menu-header">

            <strong>
                Menu
            </strong>


            <button type="button" id="siteMenuClose" aria-label="Close navigation menu">
                &times;
            </button>

        </div>


        <nav class="site-mobile-nav">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                About Us
            </a>

            <a href="{{ route('elevator-types.index') }}" class="{{
    request()->routeIs('elevator-types.*')
    ? 'active'
    : ''
    }}">
                Elevator Types
            </a>



            <!-- <a href="{{ route('services.index') }}" class="{{
    request()->routeIs('services.*')
    ? 'active'
    : ''
    }}">
                Services
            </a> -->

            <a href="{{ route('projects.index') }}" class="{{
    request()->routeIs('projects.*')
    ? 'active'
    : ''
    }}">
                Projects
            </a>

            <a href="{{ route('gallery.index') }}" class="{{
    request()->routeIs('gallery.*')
    ? 'active'
    : ''
    }}">
                Gallery
            </a>

            <a href="{{ route('contact.index') }}" class="{{
    request()->routeIs('contact.*')
    ? 'active'
    : ''
    }}">
                Contact
            </a>

        </nav>


        <a href="{{ route('quote.index') }}" class="site-quote-btn {{
    request()->routeIs('quote.*')
    ? 'active'
    : ''
    }}">
            Get Free Quote
        </a>

    </div>

</header>