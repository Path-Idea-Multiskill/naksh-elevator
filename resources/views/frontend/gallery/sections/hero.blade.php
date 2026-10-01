<section class="gallery-hero">

    <div class="site-container">

        <div class="gallery-hero__grid">

            {{-- LEFT --}}
            <div class="gallery-hero__content">

                <div class="gallery-hero__eyebrow">
                    <span></span>
                    PROJECT GALLERY
                </div>

                <h1>
                    Explore Our Elevator
                    Work & Installations
                </h1>

                <p>
                    Discover elevator installations,
                    completed projects and professional
                    solutions delivered by Naksh Elevator
                    across different applications.
                </p>

                <nav class="gallery-hero__breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <span>→</span>

                    <span>
                        Gallery
                    </span>
                </nav>

            </div>


            {{-- RIGHT --}}
            <!-- <div class="gallery-hero__visual">

                <div class="gallery-hero__visual-box">

                    <div class="gallery-hero__icon">
                        ◫
                    </div>

                    <div class="gallery-hero__visual-content">

                        <small>
                            NAKSH ELEVATOR
                        </small>

                        <strong>
                            Our Work in
                            Pictures
                        </strong>

                        <p>
                            Installation • Projects •
                            Quality • Performance
                        </p>

                    </div>

                    <span class="gallery-hero__watermark">
                        GALLERY
                    </span>

                </div>

            </div> -->

            <div class="gallery-hero__visual">

                <div class="gallery-hero__image-wrap">

                    <img src="{{ asset(
    'images/gallery/gallery-hero.png'
) }}" alt="Naksh Elevator project gallery" class="gallery-hero__image">

                    <div class="gallery-hero__image-overlay"></div>

                    <div class="gallery-hero__image-badge">

                        <span class="gallery-hero__image-badge-icon">
                            ↗
                        </span>

                        <div>
                            <small>
                                NAKSH ELEVATOR
                            </small>

                            <strong>
                                Quality Elevator Projects
                            </strong>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>