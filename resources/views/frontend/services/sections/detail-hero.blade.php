<section class="service-detail-hero">

    <div class="site-container">

        <div class="service-detail-hero__grid">

            <div class="service-detail-hero__content">

                <div class="service-detail-hero__eyebrow">
                    <span></span>
                    PROFESSIONAL ELEVATOR SERVICE
                </div>

                <h1>
                    {{ $service->title }}
                </h1>

                @if($service->short_description)

                    <p>
                        {{ $service->short_description }}
                    </p>

                @endif


                <nav
                    class="service-detail-hero__breadcrumb"
                    aria-label="Breadcrumb"
                >

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <span>→</span>

                    <a href="{{ route('services.index') }}">
                        Services
                    </a>

                    <span>→</span>

                    <span>
                        {{ $service->title }}
                    </span>

                </nav>

            </div>


            <!-- <div class="service-detail-hero__visual">

                <div class="service-detail-hero__box">

                    <div class="service-detail-hero__icon">
                        ⚙
                    </div>

                    <div>

                        <span>
                            NAKSH ELEVATOR
                        </span>

                        <strong>
                            Professional Service.
                            Reliable Support.
                        </strong>

                        <small>
                            Safety • Quality • Performance
                        </small>

                    </div>

                </div>

            </div> -->

            {{-- RIGHT DYNAMIC SERVICE IMAGE --}}
<div class="service-detail-hero__visual">

    <div class="service-hero-media">

        @if($service->image)

            <img
                src="{{ asset('storage/' . $service->image) }}"
                alt="{{ $service->title }}"
                class="service-hero-media__image"
            >

        @else

            <div class="service-hero-media__placeholder">
                <span>⚙</span>

                <strong>
                    {{ $service->title }}
                </strong>
            </div>

        @endif


        {{-- GRADIENT --}}
        <div class="service-hero-media__overlay"></div>


        {{-- TOP BADGE --}}
        <div class="service-hero-media__badge">
            <span>⚙</span>
            Professional Service
        </div>


        {{-- BOTTOM CONTENT --}}
        <div class="service-hero-media__content">

            <span class="service-hero-media__label">
                NAKSH ELEVATOR
            </span>

            <strong>
                {{ $service->title }}
            </strong>

            <small>
                Safety • Quality • Reliable Support
            </small>

        </div>

    </div>

</div>

        </div>

    </div>

</section>