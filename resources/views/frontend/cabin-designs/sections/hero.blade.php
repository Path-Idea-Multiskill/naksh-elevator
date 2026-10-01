<section class="cabin-page-hero">

    <div class="cabin-page-hero__container">

        <div class="cabin-page-hero__content">

            <div class="cabin-page-hero__eyebrow">
                <span></span>
                CABIN COLLECTION
            </div>

            <h1>
                Elevator Cabin
                <span>Designs</span>
            </h1>

            <p>
                Explore premium elevator cabin interiors,
                decorative ceilings, designer sheets and
                elegant finishes crafted for modern spaces.
            </p>

            <div class="cabin-page-hero__breadcrumb">
                <a href="{{ route('home') }}">
                    Home
                </a>

                <span>/</span>

                <strong>Cabin Designs</strong>
            </div>

        </div>

        <div class="cabin-page-hero__feature">

            <span class="cabin-page-hero__feature-label">
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

            <div class="cabin-page-hero__stats">

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

</section>