@extends('layouts.frontend')


@section(
    'title',
    'Elevator Projects | Naksh Elevator'
)


@section(
    'meta_description',
    'Explore residential, commercial and professional elevator projects completed by Naksh Elevator.'
)


@push('styles')

<link
    rel="stylesheet"
    href="{{ asset(
        'assets/frontend/css/projects/index.css'
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


    {{-- HERO --}}
    @include(
        'frontend.projects.sections.listing-hero'
    )


    {{-- PROJECT LIST --}}
    <section class="projects-listing">

        <div class="site-container">


            <div class="projects-listing__heading">

                <div>

                    <div class="projects-listing__eyebrow">
                        <span></span>
                        FEATURED WORK
                    </div>

                    <h2>
                        Projects That Reflect
                        Our Elevator Expertise
                    </h2>

                </div>


                <p>
                    Discover elevator projects completed
                    with careful planning, professional
                    installation and a strong focus on
                    safety and performance.
                </p>

            </div>


            @if($projects->isNotEmpty())

                <div class="projects-listing__grid">

                    @foreach($projects as $project)

                        @include(
                            'frontend.projects.sections.project-card',
                            [
                                'project' => $project
                            ]
                        )

                    @endforeach

                </div>

            @else

                <div class="projects-listing__empty">

                    <span>↗</span>

                    <h3>
                        Projects Coming Soon
                    </h3>

                    <p>
                        Our latest elevator projects
                        are currently being updated.
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