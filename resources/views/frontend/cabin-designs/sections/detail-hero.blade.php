<section class="cabin-listing-hero">

    <div class="cabin-design-container">

        <div class="cabin-listing-hero__grid">

            {{-- LEFT --}}
            <div class="cabin-listing-hero__content">

                <div class="cabin-listing-hero__eyebrow">
                    <span></span>
                    CABIN COLLECTION
                </div>

                <h1>
                    Elevator Cabin
                    <span>Designs</span>
                </h1>

                <p>
                    Explore premium elevator cabin interiors,
                    decorative ceilings, designer sheets and elegant
                    finishes crafted for modern residential and
                    commercial spaces.
                </p>

                <div class="cabin-listing-hero__breadcrumb">

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <span>→</span>

                    <strong>
                        Cabin Designs
                    </strong>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="cabin-listing-hero__visual">

                <div class="cabin-listing-hero__visual-inner">

                    <span class="cabin-listing-hero__small">
                        PREMIUM COLLECTION
                    </span>

                    <h2>
                        Designed Around
                        Your Space
                    </h2>

                    <p>
                        Modern materials, premium finishes and
                        customizable cabin aesthetics.
                    </p>

                    <div class="cabin-listing-hero__stats">

                        <div>
                            <strong>
                                {{ $cabinDesigns->count() }}
                            </strong>
                            <span>Designs</span>
                        </div>

                        <div>
                            <strong>
                                {{ $categories->count() }}
                            </strong>
                            <span>Categories</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>