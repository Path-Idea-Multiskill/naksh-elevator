@if($relatedDesigns->count())

<section class="cabin-related">

    <div class="cabin-detail-container">

        <div class="cabin-related__heading">

            <div>
                <span class="cabin-detail-label">
                    MORE DESIGNS
                </span>

                <h2>
                    You May Also Like
                </h2>
            </div>

            <a href="{{ route('cabin-designs.index') }}">
                View All Designs →
            </a>

        </div>

        <div class="cabin-related__grid">

            @foreach($relatedDesigns as $design)

                @include(
                    'frontend.cabin-designs.sections.design-card',
                    ['design' => $design]
                )

            @endforeach

        </div>

    </div>

</section>

@endif