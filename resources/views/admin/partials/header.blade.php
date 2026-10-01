<header class="admin-header">

    <div class="header-left">

        <button
            type="button"
            class="menu-toggle"
            id="menuToggle"
            aria-label="Open menu">

            ☰

        </button>


        <div class="page-heading">

            <h1>
                @yield('page-title', 'Dashboard')
            </h1>

            <p>
                @yield('page-description', 'Naksh Elevator Administration')
            </p>

        </div>

    </div>


    <div class="header-right">

        <div class="header-user">

            <div class="header-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="header-user-info">

                <strong>
                    {{ auth()->user()->name }}
                </strong>

                <span>
                    Admin
                </span>

            </div>

        </div>


        <form
            method="POST"
            action="{{ route('admin.logout') }}">

            @csrf

            <button
                type="submit"
                class="logout-btn">

                Logout

            </button>

        </form>

    </div>

</header>