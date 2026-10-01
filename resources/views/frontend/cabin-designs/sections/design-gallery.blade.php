@if(
    !empty($cabinDesign->gallery_images) &&
    count($cabinDesign->gallery_images)
)

<section class="cabin-detail-gallery">

    <div class="cabin-detail-container">

        <div class="cabin-detail-gallery__heading">

            <div>
                <span class="cabin-detail-label">
                    DESIGN GALLERY
                </span>

                <h2>
                    Explore Design Details
                </h2>
            </div>

            <p>
                View additional images, finishes and
                design details of this elevator cabin.
            </p>

        </div>

        <div class="cabin-detail-gallery__grid">

            @foreach(
                $cabinDesign->gallery_images
                as $index => $image
            )

                <button
                    type="button"
                    class="cabin-gallery-item"
                    data-image="{{ asset('storage/' . $image) }}"
                    aria-label="View design image {{ $index + 1 }}"
                >

                    <img
                        src="{{ asset('storage/' . $image) }}"
                        alt="{{ $cabinDesign->title }} - {{ $index + 1 }}"
                        loading="lazy"
                    >

                    <span class="cabin-gallery-item__overlay">
                        <span>View Image</span>
                        <strong>↗</strong>
                    </span>

                </button>

            @endforeach

        </div>

    </div>


    <div
        class="cabin-lightbox"
        id="cabinLightbox"
        aria-hidden="true"
    >

        <button
            type="button"
            class="cabin-lightbox__close"
            id="cabinLightboxClose"
            aria-label="Close image"
        >
            ×
        </button>

        <img
            src=""
            alt="Cabin design preview"
            id="cabinLightboxImage"
        >

    </div>

</section>

@endif