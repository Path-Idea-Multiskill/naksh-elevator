<section class="about-hero">

    <div class="site-container">

        <div class="about-hero__inner">

            {{-- LEFT CONTENT --}}
            <div class="about-hero__content">

                <div class="about-hero__eyebrow">
                    <span></span>
                    ABOUT NAKSH ELEVATOR
                </div>

                <h1 class="about-hero__title">
                    {{
                        data_get(
                            $aboutContent,
                            'hero.title',
                            'Building Trust Through Safe Elevator Solutions'
                        )
                    }}
                </h1>

                <p class="about-hero__description">
                    {{
                        data_get(
                            $aboutContent,
                            'hero.description',
                            'Professional elevator solutions focused on safety, quality and reliable performance for modern buildings.'
                        )
                    }}
                </p>


                {{-- BREADCRUMB --}}
                <nav
                    class="about-hero__breadcrumb"
                    aria-label="Breadcrumb"
                >

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <span>→</span>

                    <span>About Us</span>

                </nav>

            </div>


            {{-- RIGHT VISUAL --}}
           {{-- RIGHT VISUAL --}}
<div class="about-hero__visual">

    <div class="about-hero__image-wrap">

        <img
            src="{{ asset(
                'images/about/about-hero-elevator.png'
            ) }}"
            alt="Naksh Elevator Solutions"
            class="about-hero__image"
        >

        <div class="about-hero__image-badge">

            <span>✓</span>

            <div>
                <strong>
                    Trusted Elevator Solutions
                </strong>

                <small>
                    Safety • Quality • Reliability
                </small>
            </div>

        </div>

    </div>

    <div class="about-hero__shape"></div>

</div>

        </div>

    </div>

</section>