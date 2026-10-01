@extends('layouts.frontend')


@section(
    'title',
    data_get(
        $homeContent,
        'hero.title',
        $settings?->meta_title
        ?: 'Naksh Elevator'
    )
)


@section(
    'meta_description',
    data_get(
        $homeContent,
        'hero.description',
        $settings?->meta_description
        ?: ''
    )
)


@push('styles')

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/hero.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/elevator-types.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/about.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/services.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/why-choose-us.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/projects.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/testimonials.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/home/cta.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/home/map.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/home/hero-carousel.css') }}">

@endpush


@section('content')

    {{-- @include(
    'frontend.home.sections.hero'
    )--}}

    @include('frontend.home.sections.hero-carousel')


    @include(
        'frontend.home.sections.elevator-types'
    )

    @include(
        'frontend.home.sections.about'
    )


    {{-- @include('frontend.home.sections.services') --}}

    @include(
        'frontend.home.sections.why-choose-us'
    )

    @include(
        'frontend.home.sections.projects'
    )

    @include(
        'frontend.home.sections.testimonials'
    )

    @include('frontend.home.sections.map')

    @include(
        'frontend.home.sections.cta'
    )

@endsection

@push('scripts')

    <script src="{{ asset(
        'assets/frontend/js/home/testimonials.js'
    ) }}"></script>

    <script src="{{ asset('assets/frontend/js/home/hero-carousel.js') }}" defer></script>

    <script src="{{ asset('assets/frontend/js/home/elevator-types.js') }}" defer></script>

    <script src="{{ asset('assets/frontend/js/home/projects.js') }}" defer></script>

@endpush