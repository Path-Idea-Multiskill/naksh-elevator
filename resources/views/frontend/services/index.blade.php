@extends('layouts.frontend')


@section(
    'title',
    'Elevator Services | Naksh Elevator'
)


@section(
    'meta_description',
    'Professional elevator installation, maintenance and modernization services by Naksh Elevator.'
)


@push('styles')

    <link
        rel="stylesheet"
        href="{{ asset(
            'assets/frontend/css/services/index.css'
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
        'frontend.services.sections.listing-hero'
    )


    {{-- SERVICES LISTING --}}
    <section class="services-listing">

        <div class="site-container">


            {{-- HEADING --}}
            <div class="services-listing__heading">

                <div>

                    <div class="services-listing__eyebrow">
                        <span></span>
                        WHAT WE DO
                    </div>

                    <h2>
                        Professional Services for
                        Every Elevator Requirement
                    </h2>

                </div>


                <p>
                    From new elevator installation
                    to maintenance and modernization,
                    our services are designed to support
                    safe and reliable elevator operation.
                </p>

            </div>


            {{-- SERVICES --}}
            @if($services->isNotEmpty())

                <div class="services-listing__grid">

                    @foreach($services as $service)

                        @include(
                            'frontend.services.sections.service-card',
                            [
                                'service' => $service
                            ]
                        )

                    @endforeach

                </div>

            @else

                <div class="services-listing__empty">

                    <span>⚙</span>

                    <h3>
                        Services Coming Soon
                    </h3>

                    <p>
                        Our elevator services are
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