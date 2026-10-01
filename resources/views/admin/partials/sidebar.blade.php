<aside class="admin-sidebar" id="adminSidebar">

    <div class="sidebar-brand">

        <div class="brand-logo">
            <img src="{{ asset('images/logo/naksh-logo.png') }}" alt="Naksh Elevator">
        </div>

        <button type="button" class="sidebar-close" id="sidebarClose" aria-label="Close menu">
            &times;
        </button>

    </div>


    <nav class="sidebar-nav">

        <span class="nav-label">
            MAIN MENU
        </span>


        <a href="{{ route('admin.dashboard') }}"
            class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <span class="nav-icon">▦</span>

            <span>Dashboard</span>

        </a>


        <a href="{{ route('admin.elevator-types.index') }}"
            class="nav-item {{ request()->routeIs('admin.elevator-types.*') ? 'active' : '' }}">

            <span class="nav-icon">↕</span>

            <span>Elevator Types</span>

        </a>


        <!-- <a href="{{ route('admin.services.index') }}"
            class="nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
            <span class="nav-icon">⚙</span>
            <span>Services</span>
        </a> -->


        <a href="{{ route('admin.projects.index') }}"
            class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <span class="nav-icon">▣</span>
            <span>Projects</span>
        </a>


        <a href="{{ route('admin.gallery.index') }}"
            class="nav-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
            <span class="nav-icon">▧</span>
            <span>Gallery</span>
        </a>

        <!-- <a href="{{ route('admin.cabin-designs.index') }}"
            class="nav-item {{ request()->routeIs('admin.cabin-designs.*') ? 'active' : '' }}">

            <span class="nav-icon">▥</span>

            <span>Cabin Designs</span>

        </a> -->


        <a href="{{ route('admin.testimonials.index') }}"
            class="nav-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
            <span class="nav-icon">★</span>
            <span>Testimonials</span>
        </a>


        <span class="nav-label nav-label-space">
            LEADS
        </span>


        <a href="{{ route('admin.enquiries.index') }}"
            class="nav-item {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
            <span class="nav-icon">✉</span>

            <span>
                Enquiries
            </span>

            @php
                $sidebarNewEnquiries =
                    \App\Models\Enquiry::where(
                        'status',
                        'new'
                    )->count();
            @endphp

            @if($sidebarNewEnquiries > 0)

                    <span class="nav-count">
                        {{ $sidebarNewEnquiries > 99
                ? '99+'
                : $sidebarNewEnquiries
                                                                            }}
                    </span>

            @endif
        </a>


        <a href="{{ route('admin.quote-requests.index') }}"
            class="nav-item {{ request()->routeIs('admin.quote-requests.*') ? 'active' : '' }}">
            <span class="nav-icon">₹</span>

            <span>
                Quote Requests
            </span>

            @php
                $sidebarNewQuotes =
                    \App\Models\QuoteRequest::where(
                        'status',
                        'new'
                    )->count();
            @endphp

            @if($sidebarNewQuotes > 0)

                    <span class="nav-count">

                        {{ $sidebarNewQuotes > 99
                ? '99+'
                : $sidebarNewQuotes
                                                                    }}

                    </span>

            @endif
        </a>


        <span class="nav-label nav-label-space">
            WEBSITE
        </span>


        <a href="{{ route('admin.website-content.index') }}" class="nav-item {{
    request()->routeIs('admin.website-content.*')
    ? 'active'
    : ''
    }}">
            <span class="nav-icon">
                ▤
            </span>

            <span>
                Website Content
            </span>
        </a>


        <a href="{{ route('admin.settings.edit') }}" class="nav-item {{
    request()->routeIs('admin.settings.*')
    ? 'active'
    : ''
    }}">
            <span class="nav-icon">
                ⚙
            </span>

            <span>
                Settings
            </span>
        </a>

    </nav>


    <div class="sidebar-footer">

        <div class="sidebar-user">

            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="user-info">

                <strong>
                    {{ auth()->user()->name }}
                </strong>

                <span>
                    Administrator
                </span>

            </div>

        </div>

    </div>

</aside>