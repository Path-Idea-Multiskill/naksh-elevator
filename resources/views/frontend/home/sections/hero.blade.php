<section class="home-hero">

    <div class="site-container">

        <div class="home-hero-grid">

            {{-- LEFT CONTENT --}}
            <div class="home-hero-content">

                <span class="home-hero-eyebrow">
                    {{
    data_get(
        $homeContent,
        'hero.badge',
        'WELCOME TO NAKSH ELEVATOR'
    )
                    }}
                </span>


                <h1 class="home-hero-title">

                    {{
    data_get(
        $homeContent,
        'hero.title',
        'Safe, Reliable & Modern Elevator Solutions'
    )
                    }}

                </h1>


                <p class="home-hero-description">

                    {{
    data_get(
        $homeContent,
        'hero.description',
        'Professional elevator solutions for residential, commercial and industrial buildings.'
    )
                    }}

                </p>


                <div class="home-hero-actions">

                    <a href="{{ route('quote.index') }}" class="home-hero-btn home-hero-btn-primary">
                        {{
    data_get(
        $homeContent,
        'hero.primary_button',
        'Get Free Quote'
    )
                        }}
                    </a>


                    <a href="#homeElevatorTypes" class="home-hero-btn home-hero-btn-secondary">
                        {{
    data_get(
        $homeContent,
        'hero.secondary_button',
        'Explore Elevators'
    )
                        }}
                    </a>

                </div>


                <div class="home-hero-trust">

                    <div>
                        <strong>Quality</strong>
                        <span>Components</span>
                    </div>

                    <div>
                        <strong>Expert</strong>
                        <span>Installation</span>
                    </div>

                    <div>
                        <strong>Reliable</strong>
                        <span>Support</span>
                    </div>

                </div>

            </div>


            {{-- RIGHT VISUAL --}}
            <div class="home-hero-visual">

                <div class="home-hero-visual-bg"></div>

                <!-- <div class="home-hero-placeholder">

                    <span>
                        NAKSH
                    </span>

                    <strong>
                        Elevator Solutions
                    </strong>

                    <small>
                        Hero elevator image will be
                        placed here
                    </small>

                </div> -->

                <div class="home-hero__image">

                    <img src="{{ asset(
    'images/home/hero-elevator.png'
) }}" alt="Naksh Elevator modern elevator solution">

                </div>

                <div class="home-hero-floating-card">

                    <span class="home-hero-check">
                        ✓
                    </span>

                    <div>
                        <strong>
                            Safety First
                        </strong>

                        <small>
                            Professional installation
                            & support
                        </small>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>