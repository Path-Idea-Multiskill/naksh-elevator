@extends('layouts.frontend')

@section(
    'title',
    'Elevator Cabin Designs | Naksh Elevator'
)

@section(
    'meta_description',
    'Explore premium elevator cabin interiors, decorative ceilings, designer sheets and modern cabin finishes by Naksh Elevator.'
)

@push('styles')
<link
    rel="stylesheet"
    href="{{
        asset(
            'assets/frontend/css/cabin-designs/index.css'
        )
    }}"
>
@endpush

@section('content')

    @include(
        'frontend.cabin-designs.sections.hero'
    )

    @include(
        'frontend.cabin-designs.sections.filters'
    )

    <section class="cabin-collection">

        <div class="cabin-design-container">

            <div class="cabin-collection__heading">

                <div>
                    <span>
                        EXPLORE DESIGNS
                    </span>

                    <h2>
                        Find the Right Look
                        for Your Elevator
                    </h2>
                </div>

                <p>
                    Browse our collection of modern,
                    decorative and premium elevator
                    cabin design solutions.
                </p>

            </div>

            @if ($cabinDesigns->count())

                <div
                    class="cabin-design-grid"
                    id="cabinDesignGrid"
                >

                    @foreach ($cabinDesigns as $design)

                        @include(
                            'frontend.cabin-designs.sections.design-card',
                            ['design' => $design]
                        )

                    @endforeach

                </div>

                <div
                    class="cabin-no-results"
                    id="cabinNoResults"
                    hidden
                >
                    No designs available in this category.
                </div>

            @else

                <div class="cabin-no-results">
                    Cabin designs will be available soon.
                </div>

            @endif

        </div>

    </section>

    @include('frontend.components.cta')

@endsection

@push('scripts')
<script
    src="{{ asset('assets/frontend/js/cabin-designs/index.js') }}"
    defer
></script>
@endpush