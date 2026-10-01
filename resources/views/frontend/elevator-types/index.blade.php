@extends('layouts.frontend')


@section(
    'title',
    'Elevator Types | Naksh Elevator'
)


@push('styles')

    <link
        rel="stylesheet"
        href="{{ asset(
            'assets/frontend/css/elevator-types/index.css'
        ) }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset(
            'assets/frontend/css/components/cta.css'
        ) }}"
    >

@endpush


@section('content')


    {{-- PAGE HERO --}}
    @include(
        'frontend.elevator-types.sections.listing-hero'
    )


    {{-- ELEVATOR TYPES --}}
    <section class="et-listing">

        <div class="site-container">


            <div class="et-listing__heading">

                <div>

                    <div class="et-listing__eyebrow">
                        <span></span>
                        ELEVATOR TYPES
                    </div>

                    <h2>
                        Find the Right Elevator
                        for Your Requirement
                    </h2>

                </div>


                <p>
                    Choose from our range of elevator
                    solutions designed for different
                    buildings, applications and
                    passenger requirements.
                </p>

            </div>


            @if($elevatorTypes->isNotEmpty())

                <div class="et-listing__grid">

                    @foreach(
                        $elevatorTypes as $type
                    )

                        @include(
                            'frontend.elevator-types.sections.type-card',
                            ['type' => $type]
                        )

                    @endforeach

                </div>

            @else

                <div class="et-listing__empty">

                    <span>↕</span>

                    <h3>
                        Elevator Types Coming Soon
                    </h3>

                    <p>
                        Our elevator solutions are
                        currently being updated.
                    </p>

                </div>

            @endif


        </div>

    </section>


    {{-- CTA --}}
    @include(
        'frontend.components.cta'
    )


@endsection