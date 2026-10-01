@extends('layouts.frontend')


@section(
    'title',
    data_get(
        $aboutContent,
        'seo.meta_title',
        'About Us | Naksh Elevator'
    )
)


@section(
    'meta_description',
    data_get(
        $aboutContent,
        'seo.meta_description',
        'Learn more about Naksh Elevator.'
    )
)


@push('styles')

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/about/hero.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/about/story.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/about/mission-vision.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/about/why-us.css'
    ) }}">

    <link rel="stylesheet" href="{{ asset(
        'assets/frontend/css/components/cta.css'
    ) }}">

@endpush


@section('content')

    {{-- About Hero --}}
    @include(
        'frontend.about.sections.hero'
    )

    {{-- Our Story --}}

    @include(
        'frontend.about.sections.story'
    )

    {{-- Mission & Vision --}}

    @include(
        'frontend.about.sections.mission-vision'
    )

    {{-- Why Choose Us --}}

    @include(
        'frontend.about.sections.why-us'
    )

    {{-- CTA --}}

    @include(
        'frontend.components.cta'
    )

@endsection